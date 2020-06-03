<?php
require_once('core/ini.php');

$keyword = Input::get('tag');
if(!empty($keyword)) {
  $blog = new Blog();
  $result = $blog->search($keyword);
  $search = Input::get('tag');
  // debug($result);
} else {
  redirectTo(BASE_URL);
}

require_once(VIEWS . 'search.php');
