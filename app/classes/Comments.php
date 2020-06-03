<?php
class Comments {
  private $_name,
          $_email,
          $_text,
          $_title,
          $_created,
          $_db,
          $_error = array();

  function __construct(){
    global $db;
    $this->_db = $db;
  }

  public function create($id, $comment = array()){
    if(!empty($id) && sizeof($comment)>0){
      $this->_name = trim(filter_var($comment['name'], FILTER_SANITIZE_STRING));
      $this->_email = filter_var($comment['email'], FILTER_SANITIZE_EMAIL);
      $this->_text = filter_var($comment['text'], FILTER_SANITIZE_STRING);
      $this->_title = filter_var($comment['title'], FILTER_SANITIZE_STRING);

      if($this->validate()){
        $qry = $this->_db->prepare('INSERT INTO `comments`(`name`, `email`, `title`, `text`, `post_id`) VALUES (:name, :email, :title, :text, :post_id)');
        $result = $qry->execute([
          'name' => $this->_name,
          'email' => $this->_email,
          'text' => $this->_text,
          'title' => $this->_title,
          'post_id' => $id
        ]);
        return true;
      }
    }
    return false;
  }

  public function getById($id){
    $qry = $this->_db->prepare('SELECT * FROM `comments` WHERE 	post_id = :id order by created Desc');
    $qry->execute([
      'id' => $id
    ]);
    $result = $qry->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function error() {
    if(!empty($this->_error))
      return $this->_error[0];
    return false;
  }

  private function validate(){
    if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL) || strlen($this->_email)<10){
      $this->_error [] = "Email is invalid";
      return false;
    }
    return true;
  }

}
