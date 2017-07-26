<?php
require_once('core/ini.php');

$slug = Input::get('slug');

$blog = new Blog();
if($blog->getBySlug($slug)) {
  $data = $blog->getBySlug($slug);
  $data['created']  = $blog->getDate($data['created'], $data['updated']);
  $data['body'] = $blog->getBody($data['body']);

  $cmt = new Comments();
  $comments = $cmt->getById($data['id']);

  if(!empty(Input::get('comment'))){
    $newComment = array(
      'name' => Input::get('name'),
      'email' =>Input::get('email'),
      'text' => Input::get('comment')
    );
    if($cmt->create($data['id'], $newComment)){
      $_SESSION['msg'] = 'Thanks for commenting.';
      echo error($_SESSION['msg']);
      session_unset('msg');
    } else {
      echo error($cmt->error()[0]);
    }
  }
} else {
  header('Location: ' . BASE_URL);
}

require_once(VIEWS . 'post.php');
