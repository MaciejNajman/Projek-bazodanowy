<?php

namespace app\controllers;

use core\App;
use core\ParamUtils;
use app\forms\przyjacForm;

class przyjacCtrl {
    
    private $form; //dane formularza kupowania
    private $records; //rekordy pobrane z bazy danych
    
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new przyjacForm();
    }
 
    public function load_data(){
        try {
            $this->records = App::getDB()->select("zamowienie", [
                    "idZamowienie",
                    "czy_przyjeto_zamowienie",
                    "data_zlozenia_zamowienia"
            ]);
            
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
            }
    }
    
    public function przyjmij(){
        
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
 
                try {
                    App::getDB()->update("zamowienie", [
                        "czy_przyjeto_zamowienie"=>1
                    ],[
                        "idZamowienie"=>$this->form->id
                    ]);
                } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
    }
          
    public function action_przyjacZamowienie() {
        $this->load_data();
        App::getSmarty()->assign('roleForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('zamowienia', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display("przyjacView.tpl");
        $this->przyjmij();
    }
 
}

