<?php
function upper($str){
  return ucfirst($str);
}

function title(){
  return upper($GLOBALS['config']['title']);
}

function summary($text){
  return substr($text, 0, 200) . "...";
}

function redirectTo($location){
  header('Location: ' . $location);
}

function timestampToDate($timestamp){
  return date('d M Y', strtotime($timestamp));
}

function error($str){
  return '<div class="error"><center>'.upper($str).'</center></div>';
}

function center($str){
  return '<br><center>'. $str .'</center>';
}

// function escape($str){
//   return htmlentities($str, ENT_QUOTES, "UTF-8");
// }

function uniqueSlug(){
  return round(time()%10000);
}

function splitTags($str){
  $length = strlen($str);
  if ($str[$length-1] == ';') {
      $str = substr($str,0, $length-1);
  }
  return explode(';', trim($str));
}

function uploadImage(){
	if(!empty($_FILES['image'])){
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['type'];

  	$image_extension = str_split($image_type, strpos($image_type, '/')+1)[1];
    $image_name = uniqueSlug() .".". $image_extension;
    $full_path = IMG . $image_name;

  	move_uploaded_file($image_tmp_name, $full_path);
    if(is_file($full_path)) return $image_name;
    else return false;
  }
  return false;
}

function replaceSpecialWithDash($url){
  return preg_replace("![^a-z0-9]+!i", "-", strtolower($url));
}

function debug($var){
  if($var)
    echo "tttttttt";
  else
    echo "ffffffff";
  echo "<pre>";
  print_r($var);
  exit();
}

function set_alert_msg($msg, $type='error'){
	$_SESSION['alert_msg'] = $msg;
	$_SESSION['alert_msg_type']=$type;
}

function showErrorIfExist(){
  if(isset($_SESSION['alert_msg'])){
    if($_SESSION['alert_msg_type'] == 'error')
      echo "<div class='msg alert-danger'>{$_SESSION['alert_msg']}</div>";
    else
      echo "<div class='msg alert-info'>{$_SESSION['alert_msg']}</div>";
    unset($_SESSION['alert_msg']);
    unset($_SESSION['alert_msg_type']);
  }
  // @print_r($_SESSION['alert_msg']);
}
