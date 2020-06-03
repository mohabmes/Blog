<?php
require_once('core/ini.php');
require_once(classes . "parsedown.php");

$slug = Input::get('slug');

$blog = new Blog();
$post = $blog->getBySlug($slug);

if(!empty($post)) {
  $comments = new Comments();
  $comments = $comments->getById($post->id);
  $post->tags = splitTags($post->tags);

  $Parsedown = new Parsedown();
  $post->body = $Parsedown->text(htmlspecialchars_decode($post->body));
}
else { redirectTo(BASE_URL); }


if(!empty(Input::get('comment')) && !empty(Input::get('email'))){
  $newComment = array(
    'name' => !empty($_POST['name']) ? $_POST['name'] : 'Anonymous',
    'title' =>Input::get('title'),
    'email' =>Input::get('email'),
    'text' => utf8_encode(Input::get('comment'))
  );

  $comment = new Comments();
  $result = $comment->create($post->id, $newComment);
  if($result){
    set_alert_msg('Received your comment, Thank you :)', "info");
  }
  else {
    set_alert_msg($comment->error());
  }
}
require_once(VIEWS . 'post.php');
