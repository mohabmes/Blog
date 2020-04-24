<?php
function upper($str){
  return ucfirst($str);
}

function title(){
  return upper($GLOBALS['config']['title']);
}

function error($str){
  return '<div class="error">'.upper($str).'</div>';
}

function center($str){
  return '<br><center>'. $str .'</center>';
}

function postPreview($blog){
  return
  "<div class='post'>
      <a href='{$blog['slug']}'>
        <p class='post-title'>{$blog['title']}</p>
      </a>
      <p class='post-date'>{$blog['created']}</p>
      <p class='post-body'>{$blog['body']}</p>
  </div>";
}

function commentPreview($comment){
  return
  "<div class='comment'>
    <b>{$comment['name']}</b>
    <span class='separate'> | </span>
    <i>{$comment['created']}</i>
    <p>{$comment['text']}
    </p>
  </div>";
}

function tagsPreview($tag){
  $url = BASE_URL . '/search/?tag=' . $tag;
  return "<a href='{$url}'><span>{$tag}</span></a>";
}

function pages($i){
  $url = BASE_URL . '/posts/' . $i;
  return "<li><a href='{$url}'>{$i}</a></li>";
}

function escape($str){
  return htmlentities($str, ENT_QUOTES, "UTF-8");
}
