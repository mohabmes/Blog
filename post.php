<?php
require_once('core/ini.php');

$slug = Input::get('slug');

$blog = new Blog();
if($blog->getBySlug($slug)) {
  $data = $blog->getBySlug($slug);
  $data['created']  = $blog->getDate($data['created'], $data['updated']);
  $data['body'] = $blog->getBody($data['body']);
} else {
  header('Location: ' . BASE_URL);
}

require_once(APP . 'views/post.php');
