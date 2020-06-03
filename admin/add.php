<?php
require_once('admin-ini.php');
$mode = "create";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $imageName = uploadImage();
  $blog = new Blog();
  $content = array(
    'title' => upper(Input::get('title')),
    'slug' => uniqueSlug().'-'.replaceSpecialWithDash(Input::get('title')),
    'body' => Input::get('body'),
    'tags' => Input::get('tags'),
    'image' => $imageName
  );

  if($blog->create($content)){
    $_SESSION['msg'] = 'Added successfully.';
    redirectTo(BASE_URL."admin");
  }
  else{
    $_SESSION['msg'] = $blog->error();
    echo error($_SESSION['msg']);
    unset($_SESSION['msg']);
  }

}
require_once(VIEW .'post.php');
