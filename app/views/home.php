<?php $header = title(); require_once(APP . 'views/header.php'); ?>
<div class="wrapper">
      <?php if(!empty($posts)): ?>
          <?php foreach ($posts as $post):?>
            <div class='post'>
                <a href='<?=POST.$post->slug?>'>
                  <h3 class='post-title'><?=$post->title?></h3>
                  <?php if(!empty($post->image)):?>
                    <img src="<?=IMG.$post->image?>">
                  <?php endif;?>
                  <p class='post-body'><?=summary($post->body)?></p>
                  <p class='post-date'><?=timestampToDate($post->created)?></p>
                </a>
            </div>
          <?php endforeach?>
      <?php else: ?>
          <p><center>No post yet</center></p>
      <?php endif;?>

      <div class="pagination clearfix">
        <center>
          <? if($currentPage < $numOfPages):?>
            <a href="<?=PAGE.($currentPage+1)?>">NEXT</a>
          <? endif; ?>
        </center>
      </div>
</div>

<?php require_once(APP . 'views/footer.php');
