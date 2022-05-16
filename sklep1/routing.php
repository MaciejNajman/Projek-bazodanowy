<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('gamesList'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions (akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu))

//Utils::addRoute('action_name', 'controller_class_name');
Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');

Utils::addRoute('gamesList', 'GamesListCtrl');
Utils::addRoute('gamesListPart','GamesListCtrl');
Utils::addRoute('gamesNew', 'GamesEditCtrl',['user','admin']);
Utils::addRoute('gamesEdit', 'GamesEditCtrl',['user','admin']);
Utils::addRoute('gamesSave', 'GamesEditCtrl',['user','admin']);
Utils::addRoute('gamesDelete', 'GamesEditCtrl',['admin']);
//Utils::addRoute('accessdenied', 'HelloCtrl');

Utils::addRoute('nowa', 'NowyKontroler');

Utils::addRoute('showdata', 'DataCtrl',["user","admin"]);
Utils::addRoute('cleardata', 'DataCtrl',["admin"]);