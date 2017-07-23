<?php
require_once('core/ini.php');

$tags = Tags::get();
$blogObj = new Blog();
$page = Input::get('p');
$posts = $blogObj->getFrom($page, 5);

require_once(APP . 'views/all_posts.php');
