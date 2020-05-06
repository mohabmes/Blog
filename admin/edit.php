<?php
require_once('admin-ini.php');
$blogObj = new Blog();
$id = Input::get('id');
$blog = array();

$mode = "edit";

if(!empty($id)){
  $blog = $blogObj->getById($id);
  if(!empty($blog)){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $content = array(
        'title' => upper(Input::get('title')),
        'body' => Input::get('body'),
        'tags' => Input::get('tags'),
        'image' => $blog['image']
      );

      if(!empty($_FILES['image']['name'])){
        $imageName = uploadImage();
        $content['image'] = $imageName;
      }

      if($blogObj->update($id, $content)){
        $_SESSION['msg'] = 'Updated successfully.';
        header('Location: panel.php');
      }
      else {
        $_SESSION['msg'] = $blogObj->error();
        echo error($_SESSION['msg']);
        unset($_SESSION['msg']);
      }
    }
  }
   else { redirectTo(BASE_URL."admin"); }
}
else { redirectTo(BASE_URL."admin"); }

require_once(VIEW . 'post.php');
