<?php
class Blog {
  private $_title,
          $_body,
          $_slug,
          $_image,
          $_tags,
          $_created,
          $_error = array(),
          $_db,
          $_editMode = false;

  function __construct(){
    global $db;
    $this->_db = $db;
  }

  public function create($blog = array()) {
    if(!empty($blog) && sizeof($blog)>=4) {
      $this->_title = trim(filter_var($blog['title'], FILTER_SANITIZE_STRING));
      $this->_body =  filter_var(utf8_encode($blog['body']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->_slug =  $this->slugFilter(filter_var($blog['slug'], FILTER_SANITIZE_STRING));
      $this->_tags  = trim(filter_var($blog['tags'], FILTER_SANITIZE_STRING));
      $this->_image  = $blog['image'];

    if($this->validate()){
        //
        $qry = $this->_db->prepare('INSERT INTO posts (`slug`, `title`, `body`, `image`, `tags`) VALUES ( :slug, :title, :body, :image, :tags)');
        $result = $qry->execute([
          'slug' => $this->_slug,
          'title' => $this->_title,
          'body' => $this->_body,
          'image' => $this->_image,
          'tags' => $this->_tags
        ]);
        return $result;
      }
    }
    return false;
  }

  public function update($id, $blog = array()) {
    $this->_editMode = true;

    if(!empty($id)){
      if(!empty($blog) && sizeof($blog)>3) {
        $this->_title = trim(filter_var($blog['title'], FILTER_SANITIZE_STRING));
        $this->_body =  filter_var(utf8_encode($blog['body']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        // $this->_slug =  $this->slugFilter(filter_var($blog['slug'], FILTER_SANITIZE_STRING));
        $this->_tags  = trim(filter_var($blog['tags'], FILTER_SANITIZE_STRING));
        $this->_image  = $blog['image'];

        if($this->validate()){
          $sql = "UPDATE `posts` SET `title`= :title,`body`= :body,`tags`= :tags,`image`= :image  WHERE `id`= :id";
          $qry = $this->_db->prepare($sql);
          return $qry->execute([
            'id' => $id,
            'title' => $this->_title,
            'body' => $this->_body,
            'image' => $this->_image,
            'tags' => $this->_tags
          ]);
        }
      }
    }
    return false;
  }

  public function delete($id){
    $qry = $this->_db->prepare('UPDATE `posts` SET deleted=1 WHERE `id`=:id');
    $qry->execute([
      'id' => $id
    ]);
    return $qry;
  }

  public function getById($id){
    $qry = $this->_db->prepare('SELECT * FROM `posts` WHERE id = :id');
    $qry->execute([
      'id' => $id
    ]);
    $result = $qry->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getBySlug($slug){
    $qry = $this->_db->prepare('SELECT * FROM `posts` WHERE slug = :slug and deleted=0');
    $qry->execute([
      'slug' => $slug
    ]);
    $result = $qry->fetch(PDO::FETCH_OBJ);
    return $result;
  }

  public function search($str){
    $qry = $this->_db->prepare('SELECT * FROM `posts` WHERE tags LIKE :search and deleted=0');
    $qry->execute([
      'search' => "%{$str}%"
    ]);
    $result = $qry->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public function getFrom($start, $count){
    $qry = $this->_db->prepare("SELECT * FROM `posts` where deleted=0 ORDER BY `id` DESC LIMIT {$start}, {$count} ");
    $qry->execute();
    $result = $qry->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public function getPostsCount(){
    $qry = $this->_db->prepare("SELECT COUNT(id) FROM `posts` where deleted=0");
    $qry->execute();
    $result = $qry->fetch(PDO::FETCH_NUM);
    return $result[0];
  }

  private function checkSlug($slug){
    global $db;
    $qry = $this->_db->prepare('SELECT COUNT(id) FROM posts WHERE slug = :slug');
    $qry->execute([
      'slug' => $slug
    ]);
    $result = $qry->fetch(PDO::FETCH_NUM);
    // print_r($result); exit();
    return $result[0] == 0 ? false : true;
  }

  private function validate() {
    if($this->_editMode == false && $this->checkSlug($this->_slug) && strlen($this->_slug)<20){
      $this->_error[] = 'Slug must be unique, more than 20 Characters';
      return false;
    }
    if(strlen($this->_title)<20){
      $this->_error[] = 'Title must be more than 20 Characters';
      return false;
    }
    if(empty($this->_tags)){
      $this->_error[] = 'Must provide tag(s)';
      return false;
    }
    if(strlen($this->_body)<200){
      $this->_error[] = 'Blog must more than 200';
      return false;
    }
    return true;
  }

  private function slugFilter($slug){
     $slug = str_replace(' ', '-', $slug);
     return $slug;
  }

  public function error() {
    if(!empty($this->_error))
      return $this->_error[0];
    return false;
  }

}
