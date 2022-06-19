<?php
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\OrderForm;

/**
 * Kontoler zamawiania built in Amelia
 *
 * @author Maciej Najman
 */

class OrderCtrl {
    
    private $form; //dane formularza
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new OrderForm();
    }
    
    //walidacja danych
    public function validateOrder() {
        //Pobranie parametrów z bazy danych z walidacją
            $this->form->imie = App::getDB()->get("uzytkownik", "imie", [
                    "idUzytkownik" => $_SESSION['id']
                ]);
        
            $this->form->nazwisko = App::getDB()->get("uzytkownik", "nazwisko", [
                    "idUzytkownik" => $_SESSION['id']
                ]);
        
            $this->form->email = App::getDB()->get("uzytkownik", "email", [
                    "idUzytkownik" => $_SESSION['id']
                ]);
       
            $this->form->nr_tel = App::getDB()->get("uzytkownik", "nr_tel", [
                    "idUzytkownik" => $_SESSION['id']
                ]);
            
        //$this->form->imie = ParamUtils::getFromRequest('imie', true, 'Imie jest wymagane');
        //$this->form->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Nazwisko jest wymagane');
        //$this->form->email = ParamUtils::getFromRequest('email', true, 'Email jest wymagany');
        //$this->form->nr_tel = ParamUtils::getFromRequest('nr_tel', true, 'Numer telefonu jest wymagany');
        $this->form->ilosc_sztuk = ParamUtils::getFromRequest('ilosc_sztuk');
        $this->form->idGry = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $_SESSION['idGry'] = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        //nie ma sensu walidować dalej, gdy brak parametrów
        
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
        if (empty($this->form->ilosc_sztuk)) {
            Utils::addErrorMessage('Podaj ilość sztuk');
        }
        
        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }
   
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
        
        if ($this->validateOrder()) {
            //dane są, ilość sztuk jest => dodaj zamowienie do bazy (z przekazaniem messages przez sesję)
            $data=date('Y-m-d H:i:s');
        try {
            App::getDB()->insert("faktura_sprzedazy", [
                    "nr_faktury_sprzedazy" => 1,
                    "data_sprzedazy" => $data,
                    "wartosc" => 1
                ]);
            $faktura_id = App::getDB()->id();
        
            App::getDB()->insert("zamowienie", [
                    //"idZamowienie" => ,//co tutaj wpisać, aby kazdemu zamowieniu dawalo nowe id; jest autoincrement wiec bedzie automatycznie wpisywac nowe
                    "data_zlozenia_zamowienia" => $data,
                    "czy_przyjeto_zamowienie" => false,
                    //"zaplacono" => $cena,
                    //"czy_zamowienie_zrealizowano" => ,
                    //"data_realizacji_zamowienia" => ,
                    "Uzytkownik_idUzytkownik" => $_SESSION['id'],
                    "Faktura_sprzedazy_idFaktura_sprzedazy" => $faktura_id //na razie na sztywno 1, brak implementacji faktury
                ]);
            
                $zamowienie_id = App::getDB()->id();
                $_SESSION['idZam'] = $zamowienie_id;
       
            App::getDB()->insert("gra_has_zamowienie", [
                    "idGra" => $this->form->idGry,
                    "idZamowienie" => $_SESSION['idZam'],//App::getDB()->select("zamowienie",["idZamowienie"],["idGra"=>$this->form->idGry]),
                    "ilosc_sztuk" => $this->form->ilosc_sztuk
                ]);
        } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
        }
            
            Utils::addInfoMessage('Dodano nowe zamówienie');
            // Po zapisie zamowienia przejdź na stronę listy gier (w ramach tego samego żądania http)
            App::getRouter()->redirectTo("confirmOrder");
        } else {
            //błąd przy zamowieniu => pozostań na stronie zamowienia
            $this->generateView();
        }
    }
    
    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('OrderView.tpl');
    }
}

