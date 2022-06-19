<?php
namespace app\controllers;

use PDOStatement;
use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\RegistrationForm;
use core\Validator;

class RegistrationCtrl{

	private $form;
	
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new RegistrationForm();
	}
	
	public function validate() {
            $this->form->login = ParamUtils::getFromRequest('login', $required = true, $required_message = 'Login jest wymagany');
            $this->form->password = ParamUtils::getFromRequest('password', $required = true, $required_message = 'Haslo jest wymagane');
            $this->form->password2 = ParamUtils::getFromRequest('password2', $required = true, $required_message = 'Powtórz hasło');
            $this->form->name= ParamUtils::getFromRequest('name', $required = true, $required_message = 'Imie jest wymagane');
            $this->form->surname= ParamUtils::getFromRequest('surname', $required = true, $required_message = 'Nazwisko jest wymagane');
            $this->form->email= ParamUtils::getFromRequest('email', $required = true, $required_message = 'Email jest wymagany');
            $this->form->tel= ParamUtils::getFromRequest('tel', $required = true, $required_message = 'Numer telefonu jest wymagany');
            
	//nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;
        if (!isset($this->form->password))
            return false;
        if (!isset($this->form->password2))
            return false;
        if (!isset($this->form->name))
            return false;
        if (!isset($this->form->surname))
            return false;
        if (!isset($this->form->email))
            return false;
        if (!isset($this->form->tel))
            return false;
		
        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->password)) {
            Utils::addErrorMessage('Nie podano hasla');
        }
        if (empty($this->form->password2)) {
            Utils::addErrorMessage('Nie powtorzono hasla');
        }
        if (empty($this->form->name)) {
            Utils::addErrorMessage('Nie podano imienia');
        }
        if (empty($this->form->surname)) {
            Utils::addErrorMessage('Nie podano nazwiska');
        }
        if (empty($this->form->email)) {
            Utils::addErrorMessage('Nie podano emaila');
        }
        if (empty($this->form->tel)) {
            Utils::addErrorMessage('Nie podano numeru telefonu');
        }
		
	//nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;
        //czy hasla sa takie same
        if ($this->form->password==$this->form->password2){
            $user =  \trim($this->form->login);
            $password = \trim($this->form->password);
            $name = \trim($this->form->name);
            $surname = \trim($this->form->surname);
            $email = \trim($this->form->email);
            $tel = \trim($this->form->tel);
            try{
                $ile = App::getDB()->select("uzytkownik", [
                   "idUzytkownik",
                   "login",
                   "haslo",
                   "imie",
                   "nazwisko",
                   "email",
                   "nr_tel"
                   ],[ 
                   "login" => $user
                   ]);
            } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
            }
            $ile = count($ile);
            if($ile==0){
                $zapytanie = App::getDB()->insert("uzytkownik", [
                    "login" => $user,
                    "haslo" => $password,
                    "imie" => $name,
                    "nazwisko" => $surname,
                    "email" => $email,
                    "nr_tel" => $tel
                ]);
                //$zapytanie="INSERT INTO uzytkownik (login,haslo,imie,nazwisko,email,nr_tel) VALUES('$user','$password','$name','$surname','$email','$tel')";
                //App::getDB()->query($zapytanie) or die("Wystąpił błąd" );
                Utils::addInfoMessage('Uzytkownik '.$user.' zostal utworzony');
            }else{
                Utils::addErrorMessage('Taki użytkownik już istnieje. Spróbuj ponownie.');
            }
             
            }else Utils::addErrorMessage('Podane hasla nie zgadzaja sie');
        }
	
	public function action_registrationShow() {
        $this->generateView();
        }
	
	public function action_registration() {
        if ($this->validate()) {
            //zarejestrowany => przekieruj na akcje logowania (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zarejestrowano');
            App::getRouter()->redirectTo("login");
        } else {
            //niezarejestrowany=> pozostań na stronie rejestracji
            $this->generateView();
        }
        }
	
	public function generateView(){
		App::getSmarty()->assign('page_title','Strona rejestracji');
		App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
                App::getSmarty()->display('RegistrationView.tpl');		
	}
}

