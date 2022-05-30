<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use app\forms\OrderForm;

class OrderCtrl {
    
    private $form; //dane formularza
    private $jestUzytkownik;
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new OrderForm();
    }
    
    //walidacja danych
    public function validateCheck() {
        //Pobranie parametrów z walidacją
        $this->form->imie = ParamUtils::getFromRequest('imie', true, 'Imie jest wymagane');
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Nazwisko jest wymagane');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'Email jest wymagany');
        $this->form->nr_tel = ParamUtils::getFromRequest('nr_tel', true, 'Numer telefonu jest wymagany');
        $this->form->ilosc_sztuk = ParamUtils::getFromRequest('ilosc_sztuk');
       
        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;
        
        if (empty($this->form->imie)) {
            Utils::addErrorMessage('Nie podano imienia');
        }
        if (empty($this->form->nazwisko)) {
            Utils::addErrorMessage('Nie podano nazwiska');
        }
        if (empty($this->form->email)) {
            Utils::addErrorMessage('Nie podano email');
        }
        if (empty($this->form->nr_tel)) {
            Utils::addErrorMessage('Nie podano numeru telefonu');
        }
        
        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        //Determine whether the target data existed from the table.
                
            try{
                    $this->jestUzytkownik = App::getDB()->has("uzytkownik", [
                        "imie" => $this->form->imie,
                        "nazwisko" => $this->form->nazwisko,
                        "email" => $this->form->email,
                        "nr_tel" => $this->form->nr_tel
                    ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas sprawdzania rekordów');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        
        return !App::getMessages()->isError();
        
    }
   
    
//    public function dodawanieIlosciSztuk(){
//        if ($this->form->id == '') {
//                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
//                    $count = App::getDB()->count("gra_has_zamowienie");
//                    if ($count <= 20) {
//                        App::getDB()->insert("gra", [
//                            "nazwa_gry" => $this->form->nazwa_gry,
//                            "cena" => $this->form->cena,
//                            "gatunek" => $this->form->gatunek,
//                            "klasyfikacja_wiekowa" => $this->form->klasyfikacja_wiekowa,
//                            "producent_gry" => $this->form->producent_gry
//                        ]);
//                    } else { //za dużo rekordów
//                        // Gdy za dużo rekordów to pozostań na stronie
//                        Utils::addInfoMessage('Ograniczenie: Zbyt duzo rekordow. Aby dodac nowy usun wybrany wpis.');
//                        $this->generateView(); //pozostań na stronie edycji
//                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
//                    }
//        }
//    }
    public function action_orderShow() {
        $this->generateView();
        /*Testowanie zmiennych i has z medoo (ktore tutaj dziala i daje true w record2, ale w jestUzytkownik juz nie)
        $record1 = App::getDB()->get("uzytkownik", "imie", [
                    "nazwisko" => "Kowal"
                ]);   
        var_dump ($record1);
        $record2 = App::getDB()->has("uzytkownik", "imie", [
                    "imie" => "Paweł"
                ]);
        var_dump ($record2);
        var_dump ($this->jestUzytkownik);
        var_dump($this->form->imie);
        */
    }
    
    public function action_order() {
       
        if ($this->validateCheck()) { 
            
            //jeśli imie,nazwisko,email,nr_tel występują w tabeli uzytkownik to dane zostały wpisane prawidłowo => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie sprawdzono rekordy');
            App::getRouter()->redirectTo("gamesList");
            
        } else {
            //błąd przy sprawdzaniu => pozostań na stronie zamowienia
            $this->generateView();
            /*
            var_dump ($this->jestUzytkownik);
            var_dump($this->form->imie);
            var_dump($this->form->nazwisko);
            var_dump($this->form->email);
            var_dump($this->form->nr_tel);
            */
        }
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('OrderView.tpl');
    }
    
}

