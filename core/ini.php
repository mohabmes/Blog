<?php
session_start();

ini_set('display_errors', 'On');

define('CORE',    __DIR__.'/');
define('APP',     './app/');
define('classes', './app/classes/');
define('ADMIN',   './admin/');
define('CSS',     './resources/css/');
define('BASE_URL','http://localhost/Blog');

require_once(CORE . 'function.php');
require_once(CORE . 'config.php');
require_once(CORE . 'db.php');


require_once(classes . 'Tags.php');
require_once(classes . 'Blog.php');
require_once(classes . 'Input.php');
