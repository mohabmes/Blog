<?php
require_once('admin-ini.php');

$id = Input::get('id');
$obj = new Blog();

if(!empty($id) && !empty($obj->getById($id)) )$obj->delete($id);
redirectTo(BASE_URL."admin");
