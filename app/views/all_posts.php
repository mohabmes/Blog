<?php
  $header = 'MMES | All posts';
  require_once APP . 'views/header.php';
?>
<div class="wrapper">
    <form action="search/" method="get" class="form">
      <center>
        <input type="text" name="search" placeholder="Search" value="<?php echo Input::get('search'); ?>">
        <input type="submit" value="Search">
      </center>
    </form>

  <div class="panel">
    <p class="title">All Posts</p>
      <?php
        if(isset($posts) && !empty($posts)){
          foreach ($posts as $post){
            $post['created'] = $blogObj->getDate($post['created'], $post['updated'] );
            $post['slug'] = $blogObj->getSlug($post['slug']);
            $post['body'] = $blogObj->getPreviewBody($post['body']);
            echo postPreview($post);
          }
        } else {
          echo center('<< No post yet >>');
        }
      ?>
  </div>

  <div class="tags">
    <p class="title">Tags</p>
    <?php
      if(isset($tags) && !empty($tags)){
        foreach ($tags as $tag ){
          echo tagsPreview($tag['title']);
        }
      } else {
        echo center('<< No Tag yet >>');
      }
    ?>
  </div>
  <div class="clearfix"></div>
  <div class="pagination clearfix">
    <ul>
    <?php
      for($i=1 ; $i<=$numOfPages ; $i++)
        echo pages($i);
    ?>
    </ul>
  </div>

</div>
<?php
  require_once APP . 'views/footer.php';
