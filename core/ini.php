<?php
session_start();

//ini_set('display_errors', 'On');

define('CORE' ,    __DIR__.'/');
define('APP'  ,   './app/');
define('ADMIN',   './admin/');
define('CSS'  ,   './resources/css/');
define('BASE_URL', 'http://localhost/Blog/');

require_once(CORE . 'function.php');
require_once(CORE . 'config.php');
require_once(CORE . 'db.php');
