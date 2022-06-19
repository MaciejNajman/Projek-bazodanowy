<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\OrderConfirmForm;

/**
 * Kontroler potwierdzający przyjęcie zamowienia built in Amelia
 *
 * @author Maciej Najman
 */

class OrderConfirmCtrl {

    private $form; //dane formularza kupowania
    private $records; //rekordy pobrane z bazy danych
    private $records1; //redordy z tabeli zamowienie
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new OrderConfirmForm();
    }
    
    //public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy gier (parametr jest wymagany)
        //$this->form->id = ParamUtils::getFromGet('id');//getFromPost('id', true, 'Błędne wywołanie aplikacji'); getFromPost przy usuwaniu dawało "Błędne...
        //return !App::getMessages()->isError();
        //$this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        //return !App::getMessages()->isError();
    //}

    public function load_data() {
        // 3. Pobranie listy rekordów z bazy danych
        // W tym wypadku zawsze wyświetlamy listę gier bez względu na to, czy dane wprowadzone w formularzu wyszukiwania są poprawne.
        // Dlatego pobranie nie jest uwarunkowane poprawnością walidacji (jak miało to miejsce w kalkulatorze)
        //przygotowanie frazy where na wypadek większej liczby parametrów
        
        //wykonanie zapytania
    
        // 1. walidacja id gry do przepisania
        //if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych gry o podanym ID (tylko jednego rekordu)
                $this->records = App::getDB()->select("gra", "*", [
                    "idGra" => $_SESSION['idGry']
                ]);
                // 3. odczyt z bazy danych zamowienia o podanym ID (tylko jednego rekordu)
                $this->records1 = App::getDB()->select("zamowienie", [
                    "czy_przyjeto_zamowienie",
                    "data_zlozenia_zamowienia"
                    ],[
                    "idZamowienie" => $_SESSION['idZam'] 
                ]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
    }
 
    public function action_confirmOrder() {
        $this->load_data();
        // 4. wygeneruj widok
        App::getSmarty()->assign('orderForm', $this->form); // dane formularza (kupowania w tym wypadku)
        App::getSmarty()->assign('games', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->assign('zamowienia', $this->records1);
        App::getSmarty()->display("OrderConfirmView.tpl");
    }
}

