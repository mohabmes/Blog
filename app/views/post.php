<?php
  $header = title(). ' | '.$post->title;
  require_once(APP . 'views/header.php');
?>

<div class="wrapper view">
  <div class='post'>
    <center>
      <h3 class='post-title'><?=$post->title?></h3>
      <p class='post-date'><?=timestampToDate($post->created)?></p>
      <?php foreach ($post->tags as $tag):?>
        <span class="tags">
          <a href='search/?tag=<?=trim($tag)?>'><span><?=trim($tag)?></span></a>
        </span>
      <?php endforeach; ?>
    </center>
    <img src="<?=IMG.$post->image?>">
    <p class='post-body'><?=$post->body?></p>
    <?php foreach ($post->tags as $tag):?>
      <span class="tags">
        <a href='search/?tag=<?=trim($tag)?>'><span><?=trim($tag)?></span></a>
      </span>
    <?php endforeach; ?>
  </div>

  <div class="clearfix post">
    <form method="post">
      <input type="text" name="name" placeholder="Name (Anonymous)" class="col-1-width">
      <input type="email" name="email" placeholder="Email (adam@example.com)" class="col-1-width" required>
      <input type="text" name="title" placeholder="Title" class="col-1-width">
      <textarea rows="3" name="comment"  placeholder="Write your comment." required></textarea>
      <input type="submit" value="OK">
    </form>
  </div>

  <div class="clearfix">
    <?php if(!empty($comments)):?>
        <?php foreach ($comments  as $comment):?>
          <!-- $key['text'] = nl2br($key['text']);
          echo commentPreview($key); -->
          <div class='comment'>
            <h4><b><?=$comment['name']?></b></h4><?php if(!empty($comment['title'])):?><span>, <?=$comment['title']?></span><?php endif;?>
            <br><span class="post-date"><?=timestampToDate($comment['created'])?></span>
            <p><?=$comment['text']?></p>
          </div>
        <?php endforeach; ?>
    <?php else: ?>
        <center class="comment">Be the first to comment</center>
    <?php endif;?>
  </div>

</div>
<?php require_once(APP . 'views/footer.php');
