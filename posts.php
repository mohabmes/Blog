<?php
require_once('core/ini.php');

$tags = Tags::get();
$blogObj = new Blog();
$postsCount = $blogObj->getPostsCount();
$numOfPages = ceil($postsCount/5);
if($page = Input::get('p')){
  if($page>$numOfPages){
    header('Location: ' . BASE_URL);
  }
  $page = ($page-1) * 5;
  $posts = $blogObj->getFrom($page, 5);
} else {
  $posts = $blogObj->getFrom(0, 5);
}

require_once(VIEWS . 'all_posts.php');
