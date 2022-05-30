<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\GamesEditForm;

class GamesEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new GamesEditForm();
    }

    // Walidacja danych przed zapisem (nowe dane lub edycja).
    public function validateSave() {
        //0. Pobranie parametrów z walidacją ??coś tutaj 'id' na 'idGra'
          $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');
          //$this->form->cena = ParamUtils::getFromPost('cena', true, 'Błędne wywołanie aplikacji');
          $this->form->gatunek = ParamUtils::getFromPost('gatunek', true, 'Błędne wywołanie aplikacji');
          $this->form->klasyfikacja_wiekowa = ParamUtils::getFromPost('klasyfikacja_wiekowa', true, 'Błędne wywołanie aplikacji');
          $this->form->producent_gry = ParamUtils::getFromPost('producent_gry', true, 'Błędne wywołanie aplikacji');

        if (App::getMessages()->isError())
            return false;

        // 1. sprawdzenie czy wartości wymagane nie są puste
        $v = new Validator();

        $this->form->nazwa_gry = $v->validateFromPost('nazwa_gry', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj nazwe gry',
            'min_length' => 1,
            'max_length' => 45,
            'validator_message' => 'Nazwa gry powinna miec od 1 do 45 znaków'
        ]);
        
        $this->form->cena = $v->validateFromPost('cena', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj cene',
            'min_length' => 1,
            'max_length' => 11,
            'numeric' => true,
            'max' => 99999999.99,
            'validator_message' => 'Cena powinna miec od 1 do 10 znaków i zapis z "."'
        ]);

        if (App::getMessages()->isError())
            return false;

        // 2. sprawdzenie poprawności przekazanych parametrów
        //2.1 sformatowanie ceny do formatu francuskiego (1 234,56)
        //moze lepiej sprawdzac is_numeric czy dobrze przekazana cena?
        $c =  number_format($this->form->cena, 2, ',', ' ');
        if ($c === false) {
            Utils::addErrorMessage('Zły format ceny. Przykład: 10,99');
        }

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy gier (parametr jest wymagany)
        //$this->form->id = ParamUtils::getFromGet('id');//getFromPost('id', true, 'Błędne wywołanie aplikacji'); getFromPost przy usuwaniu dawało "Błędne...
        //return !App::getMessages()->isError();
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_gamesNew() {
        $this->generateView();
    }

    //wyswietlenie rekordu do edycji wskazanego parametrem 'id'
    public function action_gamesEdit() {
        // 1. walidacja id gry do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych gry o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("gra", "*", [
                    "idGra" => $this->form->id
                ]);
                // 2.1 jeśli gra istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['idGra'];
                $this->form->nazwa_gry = $record['nazwa_gry'];
                $this->form->cena = $record['cena'];
                $this->form->gatunek = $record['gatunek'];
                $this->form->klasyfikacja_wiekowa = $record['klasyfikacja_wiekowa'];
                $this->form->producent_gry = $record['producent_gry'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_gamesDelete() {
        // 1. walidacja id gry do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("gra", [
                    "idGra" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy gier
        App::getRouter()->forwardTo('gamesList');   
    }

    public function action_gamesSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("gra");
                    if ($count <= 20) {
                        App::getDB()->insert("gra", [
                            "nazwa_gry" => $this->form->nazwa_gry,
                            "cena" => $this->form->cena,
                            "gatunek" => $this->form->gatunek,
                            "klasyfikacja_wiekowa" => $this->form->klasyfikacja_wiekowa,
                            "producent_gry" => $this->form->producent_gry
                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt duzo rekordow. Aby dodac nowy usun wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("gra", [
                        "nazwa_gry" => $this->form->nazwa_gry,
                        "cena" => $this->form->cena,
                        "gatunek" => $this->form->gatunek,
                        "klasyfikacja_wiekowa" => $this->form->klasyfikacja_wiekowa,
                        "producent_gry" => $this->form->producent_gry
                            ], [
                        "idGra" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy gier (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('gamesList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('GamesEdit.tpl');
    }

}
