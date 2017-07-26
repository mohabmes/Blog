<?php
  $header = 'MMES | Blog';
  require_once APP . 'views/header.php';
?>
<div class="wrapper">
  <div class="welcome-msg">
    <p>Welcome.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec fermentum enim, eget vestibulum nibh. Donec vitae gravida risus. Nunc tincidunt vitae tortor pellentesque laoreet. Fusce eleifend orci ut dolor vulputate Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec fermentum enim, eget vestibulum nibh. Donec vitae gravida risus. Nunc tincidunt vitae tortor pellentesque laoreet. Fusce eleifend orci ut dolor vulputate.
    </p>
  </div>


    <div class="panel">
      <p class="title">Recent Posts</p>
        <?php
          if(isset($recent) && !empty($recent)){
            foreach ($recent as $post){
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

    <div class="about">
      <p class="title">About</p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec fermentum enim, eget vestibulum nibh. Donec vitae gravida risus. Nunc tincidunt vitae tortor pellentesque laoreet.
      </p>
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
