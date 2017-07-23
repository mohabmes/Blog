<?php
require_once('core/ini.php');

if(!empty(Input::get('search') || !empty(Input::get('tag')))) {

  $tags = Tags::get();

  $blog = new Blog();

  if(!empty(Input::get('search'))){
    $result = $blog->search(Input::get('search'));
    $search = Input::get('search');
  } else if (!empty(Input::get('tag'))) {
    $result = $blog->searchByTag(Input::get('tag'));
    $search = Input::get('tag');
  }
} else {
  header('Location: ' . BASE_URL);
}

require_once(APP . 'views/search.php');
