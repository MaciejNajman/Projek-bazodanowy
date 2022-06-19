<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RoleForm;

class RoleCtrl{
    private $form;

	public function __construct(){
            //stworzenie potrzebnych obiektów
            $this->form = new RoleForm();
	}
        
        public function validate(){
            $this->form->idUzytkownik = ParamUtils::getFromRequest('id_uzyt', $required = false, $required_message = 'Id uzytkownika jest wymagane');
            $this->form->idRola = ParamUtils::getFromRequest('id_roli', $required = false, $required_message = 'Id roli jest wymagane');
           
            // sprawdzenie, czy potrzebne wartości zostały przekazane
            if (empty($this->form->idUzytkownik)) {
                Utils::addErrorMessage('Nie podano id uzytkownika');
            }
            if (empty($this->form->idRola)) {
                Utils::addErrorMessage('Nie podano id roli');
            }
            
            if (App::getMessages()->isError())
                return false;
            
            try {
                    App::getDB()->insert("uzytkownik_rola", [
                    "idUzytkownik" => $this->form->idUzytkownik,
                    "idRola" => $this->form->idRola
                    ]);
                    Utils::addInfoMessage("Dodano rolę");
                  
            }catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        
        public function load_data() {

        // 3. Pobranie listy rekordów z bazy danych
       
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("uzytkownik", [
                "idUzytkownik",
                "imie",
                "nazwisko",
                "email",
                "nr_tel"
                ]);
            
            $this->records1 = App::getDB()->select("rola", [
                "idRola",
                "nazwa_roli",
                "czy_aktywna_w_systemie",
                "od_kiedy_istnieje"
                ]);
            
            $this->records2 = App::getDB()->select("uzytkownik_rola", [
                "idUzytkownik",
                "idRola"
                ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
            }
        }
       
        public function action_roleAdd() {
            $this->load_data();
            // 4. wygeneruj widok
            App::getSmarty()->assign('roleForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
            App::getSmarty()->assign('users', $this->records);  // lista rekordów z bazy danych
            App::getSmarty()->assign('rola', $this->records1);
            App::getSmarty()->assign('usersRola', $this->records2);
            App::getSmarty()->display('RoleView.tpl');
            
            //5.dodaj role
            $this->validate();
            
        }  
}
