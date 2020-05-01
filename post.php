<?php
require_once('core/ini.php');

$slug = Input::get('slug');

$blog = new Blog();
$post = $blog->getBySlug($slug);
$post->tags = explode(';', $post->tags);



if(!empty($post)) {
  $comments = new Comments();
  $comments = $comments->getById($post->id);
  // print_r($comments);
  // exit();
}
else { redirectTo(BASE_URL); }

if(!empty(Input::get('comment')) && !empty(Input::get('email'))){
  // print_r($_GET);
  // exit();
  $newComment = array(
    'name' => !empty($_GET['name']) ? $_GET['name'] : 'Anonymous',
    'title' =>Input::get('title'),
    'email' =>Input::get('email'),
    'text' => Input::get('comment')
  );

  $comment = new Comments();
  $result = $comment->create($post->id, $newComment);
  redirectTo(POST.$slug);
}
require_once(VIEWS . 'post.php');
