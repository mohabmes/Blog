<?php
function upper($str){
  return strtoupper($str);
}

function error($str){
  return '<div class="error">'.upper($str).'</div>';
}

function center($str){
  return '<br><center>'. upper($str) .'</center>';
}

function postPreview($blog){
  return
  "<a href='{$blog['slug']}'>
    <div class='post'>
      <p class='post-title'>{$blog['title']}</p>
      <p class='post-date'>{$blog['created']}</p>
      <p class='post-body'>{$blog['body']}</p>
    </div>
  </a>";
}

function tagsPreview($tag){
  $url = BASE_URL . '/search/?tag=' . $tag;
  return "<a href='{$url}'><span>{$tag}</span></a>";
}
