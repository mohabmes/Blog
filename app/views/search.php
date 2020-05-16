<?php $header = title() . " - search for $keyword"; require_once(APP . 'views/header.php'); ?>
<div class="wrapper">
      <?php if(!empty($result)): ?>
          <?php foreach ($result as $post):?>
            <div class='post'>
                <a href='<?=POST.$post->slug?>'>
                  <h3 class='post-title'><?=$post->title?></h3>
                  <p class='post-body'><?=summary($post->body)?></p>
                  <p class='post-date'><?=timestampToDate($post->created)?></p>
                </a>
            </div>
          <?php endforeach?>
      <?php else: ?>
          <p><center>No results found!</center></p>
      <?php endif;?>
</div>

<?php require_once(APP . 'views/footer.php');
