<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('gamesList'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions (akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu))

//Utils::addRoute('action_name', 'controller_class_name');
//logowanie
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
//lista produktów czyli gier
Utils::addRoute('gamesList', 'GamesListCtrl');
Utils::addRoute('gamesListPart','GamesListCtrl');
Utils::addRoute('gamesNew', 'GamesEditCtrl',['employee']);
Utils::addRoute('gamesEdit', 'GamesEditCtrl',['employee']);
Utils::addRoute('gamesSave', 'GamesEditCtrl',['employee']);
Utils::addRoute('gamesDelete', 'GamesEditCtrl',['employee']);
//kupowanie gry
Utils::addRoute('gamesBuy', 'GamesBuyCtrl',['user','employee','admin']);
//zamowienie
Utils::addRoute('order', 'OrderCtrl',['user','employee','admin']);
Utils::addRoute('orderShow', 'OrderCtrl',['user','employee','admin']);
Utils::addRoute('confirmOrder', 'OrderConfirmCtrl',['user','employee','admin']);
//rejestracja
Utils::addRoute('registrationShow', 'RegistrationCtrl');
Utils::addRoute('registration', 'RegistrationCtrl');
//dodawanie roli uzytkownikowi
//Utils::addRoute('roleShow', 'RoleCtrl',['admin']);
Utils::addRoute('roleAdd', 'RoleCtrl',['admin']);
//przyjecie zamowienia przez pracownika
Utils::addRoute('przyjacZamowienie', 'przyjacCtrl',['employee']);

//Utils::addRoute('showdata', 'DataCtrl',["user","admin"]);
//Utils::addRoute('cleardata', 'DataCtrl',["admin"]);
