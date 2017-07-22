<?php
class Input{
  public static function exists($type = 'post'){
    switch($type){
      case 'post':
        return (!isset($_POST)? false : true);
      break;
      case 'get':
        return (!isset($_GET)? false : true);
      break;
      default:
        return false;
      break;
    }
  }
  public static function get($item){
    if(isset($_POST[$item])){
      return $_POST[$item];
    }
    else if(isset($_GET[$item])){
      return $_GET[$item];
    }
    return '';
  }
}
