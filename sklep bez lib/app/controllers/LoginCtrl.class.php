<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;
use core\Validator;

class LoginCtrl{
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
        if (!isset($this->form->pass))
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
        
        //skrypt z https://mansfeld.pl/programowanie/rejestracja-logowanie-w-php-mysql/
        /*
        $query = mysqli_query($db_conn, "SELECT * FROM users WHERE user_email ='$user_email');
        if(mysqli_num_rows($query_login) > 0) {
           $record = mysqli_fetch_assoc($query_login);
           $hash = $record["user_passworhash"];
           if (password_verify($user_password, $hash)) {
              $_SESSION["current_user"] = user_id;
           }
        }
        */
        
        //pobranie danych z kolumny iduzytkownik z tabeli uzytkownik gdzie login i haslo równa się pobranemu z fomularza logowania
        try{
        $query = App::getDB()->select("uzytkownik", [
                "idUzytkownik",
            ],[
                "login" => $this->form->login,
                "haslo" => $this->form->pass
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        //zapisanie id zalogowanego uzytkownika w sesji //tu pokazuje warning
        $_SESSION['id'] = $query[0]["idUzytkownik"];
        
        $ile=count($query);
		//$wiersz = $query->fetch_assoc();
		//$idUzytkownika = $query['idUzytkownik'];
	//jesli jest tylko 1 uzytkownik o danym id to przejdz dalej	
        if ($ile==1){
            //wybierz dane z kolumny idRola z tabeli uzytkownik_rola gdzie idUzytkownik=wynikowi wczesniejszego zapytania, czyli idUzytkownika, ktory podał login i haslo
	try{
                $query1 = App::getDB()->select("uzytkownik_rola", [
                "idRola",
            ],[
                "idUzytkownik" => $query[0]["idUzytkownik"], //gdzie wiersz 0 i //kolumna idUzytkownik
            ]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
			/*
			//tu switch
			if($query1[0]["idRola"]==1){ //gdzie wiersz 0 i kolumna idRola == 1, czyli idUzytkownik=4, czyli user
				RoleUtils::addRole('user');
			}elseif($query1[0]["idRola"]==2){ //gdzie wiersz 0 i kolumna idRola == 2, czyli idUzytkownik=2, czyli admin
				RoleUtils::addRole('admin');
			}elseif($query1[0]["idRola"]==3){ //gdzie wiersz 0 i kolumna idRola == 3, czyli idUzytkownik=5, czyli employee
				RoleUtils::addRole('employee');
			}
                        */
                        switch ($query1[0]["idRola"]) {
                            case 1:
                                RoleUtils::addRole('user');
                                break;
                            case 2:
                                RoleUtils::addRole('admin');
                                break;
                            case 3:
                                RoleUtils::addRole('employee');
                                break;
                            default:
                               RoleUtils::addRole('user'); 
                        }
        }else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }
        //sprawdzenie
		//var_dump($query[0]["idUzytkownik"]);
		//var_dump($query1[0]["idRola"]);
		//echo($query[0]["idUzytkownik"])." ";
		//echo($query1[0]["idRola"])." ";
                //var_dump($_SESSION['id']);
        
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