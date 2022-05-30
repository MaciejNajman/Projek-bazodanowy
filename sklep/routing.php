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
Utils::addRoute('gamesNew', 'GamesEditCtrl',['admin','employee']);
Utils::addRoute('gamesEdit', 'GamesEditCtrl',['admin','employee']);
Utils::addRoute('gamesSave', 'GamesEditCtrl',['admin','employee']);
Utils::addRoute('gamesDelete', 'GamesEditCtrl',['admin','employee']);
//kupowanie gry
Utils::addRoute('gamesBuy', 'GamesBuyCtrl',['user']);
//zamowienie
Utils::addRoute('order', 'OrderCtrl',['user']);
Utils::addRoute('orderShow', 'OrderCtrl',['user']);
//Utils::addRoute('accessdenied', 'HelloCtrl');

//Utils::addRoute('showdata', 'DataCtrl',["user","admin"]);
//Utils::addRoute('cleardata', 'DataCtrl',["admin"]);
