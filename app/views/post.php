<?php
  $header = 'MMES | Blog';
  require_once APP . 'views/header.php';
?>
<div class="wrapper view">

  <div class="post-view">
      <p class="post-title-view">
        <?php echo $data['title']; ?>
      </p>
      <p class="post-body-view">
        <?php echo $data['body'];?>
      </p>
  </div>
  <div class="post-view">
    <p class="post-date-view">
      <?php echo $data['created']; ?>
    </p>
    <div class="tag-sec">
      <?php echo tagsPreview($data['tags']); ?>
    </div>
  </div>
  <div class="post-view">
    <div class="title">Comments</div>
  </div>
</div>
<?php
  require_once APP . 'views/footer.php';
