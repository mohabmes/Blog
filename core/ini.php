<?php
session_start();

ini_set('display_errors', 'On');

define('CORE',    __DIR__.'/');
define('APP',     './app/');
define('classes', './app/classes/');
define('VIEWS',   './app/views/');
define('CSS',     './resources/css/');
define('IMG',     './resources/images/');

require_once(CORE . 'config.php');
require_once(CORE . 'db.php');
require_once(CORE . 'function.php');

require_once(classes . 'Blog.php');
require_once(classes . 'Input.php');
require_once(classes . 'Comments.php');

define('BASE_URL', $GLOBALS['config']['base_url']."/");
define('POST', BASE_URL."post/");
define('PAGE', BASE_URL."page/");
define('SEARCH', BASE_URL.'search/');
