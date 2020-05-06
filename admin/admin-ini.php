<?php
session_start();

ini_set('display_errors', 'On');

define('CORE',    '../core/');
define('APP',     '../app/');
define('classes', '../app/classes/');
define('VIEW', './views/');
define('ADMIN',   './admin/');
define('BASE_URL','http://localhost/Blog/');
define('IMG',     '../resources/images/');
define('POST', BASE_URL."post.php?slug=");

require_once(CORE . 'config.php');
require_once(CORE . 'db.php');
require_once(CORE . 'function.php');

require_once(classes . 'Blog.php');
require_once(classes . 'Input.php');
