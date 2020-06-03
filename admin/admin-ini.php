<?php
session_start();
ini_set('display_errors', 'On');



define('CORE',    '../core/');
define('APP',     '../app/');
define('classes', '../app/classes/');
define('VIEW',    './views/');
define('ADMIN',   './admin/');
define('IMG',     '../resources/images/');

require_once(CORE . 'config.php');
require_once(CORE . 'db.php');
require_once(CORE . 'function.php');

require_once(classes . 'Blog.php');
require_once(classes . 'Input.php');

$json = file_get_contents(CORE . "config.json");
$config_json = json_decode($json, True);
$GLOBALS['config'] = $config_json;

define('BASE_URL', $GLOBALS['config']['base_url']."/");
define('POST', BASE_URL."post/");
