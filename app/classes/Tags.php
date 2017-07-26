<?php
class Tags{

  public static function get(){
      global $db;
      $qry = $db->prepare('SELECT title FROM tags');
      $qry->execute();
      $result = $qry->fetchAll(PDO::FETCH_ASSOC);
      return $result;
  }

  public static function exists($tag){
      global $db;
      $tag  = filter_var($tag, FILTER_SANITIZE_STRING);
      $qry = $db->prepare('SELECT COUNT(id) FROM tags WHERE title = :title');
      $qry->execute([
        'title' => $tag
      ]);
      $result = $qry->fetch(PDO::FETCH_NUM);
      return $result[0] > 0 ? true : false;
  }

  public static function create($tag){
      global $db;
      $tag  = filter_var($tag, FILTER_SANITIZE_STRING);
      $qry = $db->prepare('INSERT INTO tags (`title`) VALUES ( :title)');
      $qry->execute([
        'title' => $tag
      ]);
  }
}
