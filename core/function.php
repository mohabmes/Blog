<?php
function upper($str){
  return strtoupper($str);
}
function error($str){
  return '<div class="error">'.upper($str).'</div>';
}
