<?php
class Blog {
  private $_title,
          $_body,
          $_slug,
          $_tags,
          $_created,
          $_updated = null,
          $_error = array(),
          $_db;

  function __construct(){
    global $db;
    $this->_db = $db;
  }

  public function create($blog = array()) {

    if(isset($blog) && !empty($blog) && sizeof($blog)==4) {
      $this->_title = trim(filter_var($blog['title'], FILTER_SANITIZE_STRING));
      $this->_body =  filter_var($blog['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->_slug =  $this->slugFilter(filter_var($blog['slug'], FILTER_SANITIZE_STRING));
      $this->_tags  = filter_var($blog['tags'], FILTER_SANITIZE_STRING);
      $this->_created = date('F, j Y');

    if(!Tags::exists($this->_tags)){
      Tags::create($this->_tags);
    }
    if($this->validate()){
        $qry = $this->_db->prepare('INSERT INTO posts (`slug`, `title`, `body`,  `created`,  `tags`) VALUES ( :slug, :title, :body, :created, :tags)');
        $qry->execute([
          'slug' => $this->_slug,
          'title' => $this->_title,
          'body' => $this->_body,
          'created' => $this->_created,
          'tags' => $this->_tags
        ]);
        return true;
      }
    }
    return false;
  }

  public function update($id, $blog = array()) {
    global $db;
    if(!empty($id)){
      if(isset($blog) && !empty($blog) && sizeof($blog)==4) {
        $this->_title = trim(filter_var($blog['title'], FILTER_SANITIZE_STRING));
        $this->_body =  filter_var($blog['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->_slug =  filter_var($blog['slug'], FILTER_SANITIZE_STRING);
        $this->_tags  = filter_var($blog['tags'], FILTER_SANITIZE_STRING);
        $this->_updated = date('F, j Y');

        if(Tags::exists($this->_tags)){
          Tags::create($this->_tags);
        }
        if($this->validate()){
          $sql = "UPDATE `posts` SET `slug`= :slug,`title`= :title,`body`= :body,`tags`= :tags,`updated`= :updated WHERE `id`= :id";
          $qry = $this->_db->prepare($sql);
          $qry->execute([
            'id' => $id,
            'slug' => $this->_slug,
            'title' => $this->_title,
            'body' => $this->_body,
            'tags' => $this->_tags,
            'updated' => $this->_updated
          ]);
          return true;
        }
      }
    }
    return false;
  }

  public function delete($id){
    global $db;
    $qry = $this->_db->prepare('DELETE FROM `posts` WHERE id = :id');
    $qry->execute([
      'id' => $id
    ]);
    return $qry;
  }

  public function getById($id){
    global $db;
    $qry = $this->_db->prepare('SELECT * FROM `posts` WHERE id = :id');
    $qry->execute([
      'id' => $id
    ]);
    $result = $qry->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getFrom($start, $count){
    global $db;
    $qry = $this->_db->prepare("SELECT * FROM `posts` LIMIT {$start}, {$count}");
    $qry->execute();
    $result = $qry->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getRecent($count){
    global $db;
    $qry = $this->_db->prepare("SELECT * FROM `posts` ORDER BY `id` DESC LIMIT {$count}");
    $qry->execute();
    $result = $qry->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  public function getDate($created, $updated){
    if(!empty($updated)){
      return "Created {$created} - Updated {$updated}";
    } else {
      return "Created {$created}";
    }
  }

  public function getSlug($slug){
    $url =  BASE_URL . '/post/' . $slug;
    return $url;
  }

  public function getBody($body){
    return nl2br($body);
  }

  public function getPreviewBody($body){
    $body = substr($body, 450);
    return $body . '...';
  }

  private function checkSlug($slug){
    global $db;
    $qry = $this->_db->prepare('SELECT COUNT(id) FROM posts WHERE slug = :slug');
    $qry->execute([
      'slug' => $slug
    ]);
    $result = $qry->fetch(PDO::FETCH_NUM);
    return $result[0]>0 ? false : true;
  }

  private function validate() {
      if($this->checkSlug($this->_slug) && strlen($this->_slug)<30 && strlen($this->_slug)>=10){
        if(strlen($this->_title)<50 && strlen($this->_title)>=20) {
          if(!empty($this->_tags)){
            if(strlen($this->_body)>=200) {
              return true;
            } else {
              $this->_error[] = 'Blog must more than 200';
            }
          } else {
            $this->_error[] = 'Must provide tag';
          }
        } else {
          $this->_error[] = 'Title must be more than 20 and less than 50';
        }
      } else {
        $this->_error[] = 'Slug must be unique, more than 10 and less than 25';
      }
    return false;
  }

  private function slugFilter($slug){
     $slug = str_replace(' ', '-', $slug);
     return $slug;
  }

  public function error() {
    return $this->_error;
  }

}
