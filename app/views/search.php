<?php
  $header = 'MMES | Search';
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
    <p class="title">Results for " <?php echo $search; ?> "</p>
      <?php
        if(isset($result) && !empty($result)){
          foreach ($result as $post){
            $post['created'] = $blog->getDate($post['created'], $post['updated'] );
            $post['slug'] = $blog->getSlug($post['slug']);
            $post['body'] = $blog->getPreviewBody($post['body']);
            echo postPreview($post);
          }
        } else {
          echo center('<< No result found >>');
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
  <br>
  <div class="clearfix"></div>
</div>
<?php
  require_once APP . 'views/footer.php';
