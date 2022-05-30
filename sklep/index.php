<?php
use core\App;

require_once dirname(__FILE__).'/init.php';

header("Location: ". App::getConf()->app_url);