<?php
require_once('admin-ini.php');
$b = new Blog();
$id = Input::get('id');
$blog = array();

if(!empty($id)){
  if($b->getById($id)){
    $blog = $b->getById($id);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $content = array(
        'slug' => $blog['slug'],
        'title' => Input::get('title'),
        'body' => Input::get('body'),
        'tags' => Input::get('tags')
      );

      if($b->update($id, $content)){
        $_SESSION['msg'] = 'Updated successfully.';
        header('Location: panel.php');
      } else {
        $_SESSION['msg'] = $b->error()[0];
        echo error($_SESSION['msg']);
        session_unset('msg');
      }
    }

  }
   else {
    header('Location: panel.php');
  }
} else {
  header('Location: panel.php');
}


require_once(VIEW . 'edit.php');
