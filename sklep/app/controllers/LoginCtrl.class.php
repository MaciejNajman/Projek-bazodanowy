<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;
use core\Validator;

class LoginCtrl{
	/*
	$v = new Validator();
		$login = $v->validateFromRequest("login", [
			'trim' => true,
			'required' => true,
			'required_message' => 'Login jest wymagany',
			'min_length' => 1,
			'max_length' => 50,
			'validator_message' => 'Login powinien miescic sie pomiedzy 1 i 50 znakami',
		]);
	*/
	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
	}
	
	public function validate() {
            $this->form->login = ParamUtils::getFromRequest('login', $required = true, $required_message = 'Login jest wymagany');
            $this->form->pass = ParamUtils::getFromRequest('pass', $required = true, $required_message = 'Haslo jest wymagane');
		
	//nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;
		
        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasla');
        }
		
	//nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;
        
        //pobranie hasla z bazy danych gdzie login równa się pobranemu z fomularza
        $record = App::getDB()->get("uzytkownik", "haslo", [
                    "login" => $this->form->login
                ]);
        //pobranie loginu z bazy danych gdzie haslo równa się pobranemu z fomularza
        $record1 = App::getDB()->get("uzytkownik", "login", [
                    "haslo" => $this->form->pass
                ]);
        // sprawdzenie, czy dane logowania poprawne
        if ($this->form->login && $record1 == 'admin' && $this->form->pass && $record == 'admin') {
            RoleUtils::addRole('admin');
            /*
            App::getDB()->insert("uzytkownik_rola", [
            "idUzytkownik" => "2",
            "idRola" => "2"
            ]);
            */
        } else if ($this->form->login && $record1 == 'user' && $this->form->pass && $record = 'user') {
            RoleUtils::addRole('user');
            /*
            App::getDB()->insert("uzytkownik_rola", [
            "idUzytkownik" => "4",
            "idRola" => "1"
            ]);
            */
        } else if ($this->form->login && $record1 == 'employee' && $this->form->pass && $record = '1234') {
            RoleUtils::addRole('employee');
            /*
            App::getDB()->insert("uzytkownik_rola", [
            "idUzytkownik" => "5",
            "idRola" => "3"
            ]);
            */
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
	}
	
	public function action_loginShow() {
        $this->generateView();
    }
	
	public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("gamesList");
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }
	
	public function action_logout(){
		//unieważnij sesję
		session_destroy();
                //komunikat o poprawnym wylogowaniu
                Utils::addErrorMessage('Poprawnie wylogowano z systemu');
		// i przekieruj do wybranej akcji (tej domyślnej po wylogowaniu)
		App::getRouter()->redirectTo('gamesList');
	}
	
	public function generateView(){
		App::getSmarty()->assign('page_title','Strona logowania');
		App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
                App::getSmarty()->display('LoginView.tpl');		
	}
}