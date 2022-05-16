<?php

namespace app\controllers;

use core\App;

class NowyKontroler {
 
  public function action_nowa() {
 
    App::getSmarty()->display("nowy_widok.tpl");
 
  }
 
}