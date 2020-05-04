<?php
require_once('admin-ini.php');
$blogObj = new Blog();
$id = Input::get('id');
$blog = array();

if(!empty($id)){
  $blog = $blogObj->getById($id);

  if(!empty($blog)){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //
      $content = array(
        'title' => Input::get('title'),
        'slug' => uniqueSlug().'-'.replaceSpecialWithDash(Input::get('title')),
        'body' => Input::get('body'),
        'tags' => Input::get('tags'),
        'image' => $blog['image']
      );

      if(!empty($_POST['image'])){
        $imageName = uploadImage();
        $content['image'] = $imageName;
      }

// echo "<pre>";print_r($content);
// exit();

      if($blogObj->update($id, $content)){
        $_SESSION['msg'] = 'Updated successfully.';
        header('Location: panel.php');
      } else {
        $_SESSION['msg'] = $blogObj->error()[0];
        echo error($_SESSION['msg']);
        unset($_SESSION['msg']);
      }
    }
  }
   else { redirectTo(BASE_URL."admin"); }
}
else { redirectTo(BASE_URL."admin"); }
// print_r($blog);

require_once(VIEW . 'post.php');
