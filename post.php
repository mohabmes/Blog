<?php
require_once('core/ini.php');

$slug = Input::get('slug');

$blog = new Blog();
$post = $blog->getBySlug($slug);

if(!empty($post)) {
  $comments = new Comments();
  $comments = $comments->getById($post->id);
  $post->tags = splitTags($post->tags);
}
else { redirectTo(BASE_URL); }



if(!empty(Input::get('comment')) && !empty(Input::get('email'))){
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
