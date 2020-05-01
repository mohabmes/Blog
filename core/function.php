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
  return '<div class="error">'.upper($str).'</div>';
}

function center($str){
  return '<br><center>'. $str .'</center>';
}

function tagsPreview($tag){
  $url = BASE_URL . '/search/?tag=' . $tag;
  return "<a href='{$url}'><span>{$tag}</span></a>";
}

function escape($str){
  return htmlentities($str, ENT_QUOTES, "UTF-8");
}
