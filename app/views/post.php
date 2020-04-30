<?php
  $header = title(). ' | '.$data['title'];
  require_once(APP . 'views/header.php');
?>
<div class="wrapper view">
  <div class="post-view">
      <p class="post-title-view">
        <?=$post->title; ?>
      </p>
      <p class="post-body-view"><?php echo $data['body'];?></p>
  </div>
  <div class="post-view">
    <p class="post-date-view"><?php echo $data['created']; ?></p>
    <div class="tag-sec">
      <?php echo tagsPreview($data['tags']); ?>
    </div>
  </div>
  <div class="post-view">
    <div class="title">Comments</div>
    <?php
      if(!empty($comments)){
        foreach ($comments  as $key) {
          $key['text'] = nl2br($key['text']);
          echo commentPreview($key);
        }
      } else {
        echo center("<< Be the first to comment >>");
      }
    ?>

  </div>
  <div class="post-view">
    <form method="post">
      <input type="text" name="name" placeholder="Name" required>
      <input type="email" name="email" placeholder="Email (adam@example.com)" required>
      <textarea rows="10" cols="100" name="comment"  placeholder="Write your comment." required></textarea>
      <input type="submit" value="OK">
    </form>
  </div>
</div>
<?php
  require_once APP . 'views/footer.php';
