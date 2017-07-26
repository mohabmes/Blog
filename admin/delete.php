<?php
require_once('admin-ini.php');

$id = Input::get('id');
$obj = new Blog();
$data = array();

if(!empty(Input::get('id'))){

  if($data = $obj->getById($id)){

    if(!isset($_SESSION['code'])){
      $_SESSION['code'] = rand(999,10000);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_SESSION['code'] == Input::get('confirm')){
        $obj->delete($id);
        $_SESSION['msg'] = 'Deleted successfully';
        header('Location: panel.php');
      } else {
        echo error('Invalid Code');
        $_SESSION['code'] = rand(999,10000);
      }
    }

  } else {
    header('Location: panel.php');
    session_unset('code');
  }
}

require_once(VIEW . 'delete.php');
