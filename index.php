<?php
require_once('core/ini.php');

function handlePagination($blogObj, $currentPage, $postsPerPage){
  $postsCount = $blogObj->getPostsCount();
  $numOfPages = paginationCount($blogObj, $postsPerPage);

  if($currentPage > $numOfPages) redirectTo(BASE_URL);

  if(!empty($currentPage)){
    $currentPage = ($currentPage-1) * $postsPerPage;
    return $posts = $blogObj->getFrom($currentPage, $postsPerPage);
  }
  else{
    return $posts = $blogObj->getFrom(0, $postsPerPage);
  }
}

function paginationCount($blogObj, $postsPerPage){
  $numOfPages = ceil($blogObj->getPostsCount() / $postsPerPage);
  return $numOfPages;
}

$blogObj = new Blog();
$currentPage = Input::get('p');

$postsPerPage = $GLOBALS['config']['postsPerPage'];

$posts = handlePagination($blogObj, $currentPage, $postsPerPage);
$numOfPages = paginationCount($blogObj, $postsPerPage);

$currentPage = empty(Input::get('p'))? 1 : (int)Input::get('p');

require_once(VIEWS . 'home.php');


