<?php
require_once('core/ini.php');

$tags = Tags::get();
$blogObj = new Blog();
$recent = $blogObj->getRecent(5);

require_once(VIEWS . 'home.php');
