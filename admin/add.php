<?php
  require_once('admin-ini.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $blog = new Blog();
    $content = array(
      'title' => Input::get('title'),
      'slug' => Input::get('slug'),
      'body' => htmlentities(Input::get('body'), ENT_QUOTES, "UTF-8"),
      'tags' => Input::get('tags')
    );
    if($blog->create($content)){
      $_SESSION['msg'] = 'Added successfully.';
      header('Location: panel.php');
    } else {
      $_SESSION['msg'] = $blog->error()[0];
      echo error($_SESSION['msg']);
      session_unset('msg');
    }

  }
require_once(VIEW .'add.php');
