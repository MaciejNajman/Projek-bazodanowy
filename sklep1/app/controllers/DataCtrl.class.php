<?php

namespace app\controllers;

use core\App;

class DataCtrl {
 
  public function action_showdata() {
 
    App::getSmarty()->display("DataView.tpl");
 
  }
 
}
