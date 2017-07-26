<?php
class Comments {
  private $_name,
          $_email,
          $_text,
          $_created,
          $_db,
          $_error = array();

  function __construct(){
    global $db;
    $this->_db = $db;
  }

  public function create($id, $comment = array()){
    if(!empty($id) && sizeof($comment)==3){
      $this->_name = trim(filter_var($comment['name'], FILTER_SANITIZE_STRING));
      $this->_email = filter_var($comment['email'], FILTER_SANITIZE_EMAIL);
      $this->_text = filter_var($comment['text'], FILTER_SANITIZE_STRING);
      $this->_created = date('F, j Y');;

      if($this->validate()){
        $qry = $this->_db->prepare('INSERT INTO `comments`(`name`, `email`, `text`, `created`, `post_id`) VALUES (:name, :email, :text, :created, :post_id)');
        $qry->execute([
          'name' => $this->_name,
          'email' => $this->_email,
          'text' => $this->_text,
          'created' => $this->_created,
          'post_id' => $id
        ]);
        return true;
      }
    }
    return false;
  }

  public function getById($id){
    $qry = $this->_db->prepare('SELECT * FROM `comments` WHERE 	post_id = :id');
    $qry->execute([
      'id' => $id
    ]);
    $result = $qry->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function error(){
    return $this->_error;
  }

  private function validate(){
    if(strlen($this->_name)<5){
      $this->_error [] = "Name is too short";
      return false;
    }
    else if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL) || strlen($this->_email)<15){
      $this->_error [] = "Email is invalid";
      return false;
    }
    return true;
  }

}
