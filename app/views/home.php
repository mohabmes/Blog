<?php $header = title(); require_once(APP . 'views/header.php'); ?>
<div class="wrapper">
      <?php if(!empty($posts)): ?>
          <?php foreach ($posts as $post):?>
            <div class='post'>
                <a href='<?=$post->slug?>'>
                  <h3 class='post-title'><?=$post->title?></h3>
                  <img src="<?=IMG . "8.jpg"?>">
                  <p class='post-body'><?=summary($post->body)?></p>
                  <p class='post-date'><?=$post->created?></p>
                </a>
            </div>
          <?php endforeach?>
      <?php else: ?>
          <p><center>No post yet</center></p>
      <?php endif;?>

      <div class="pagination clearfix">
        <center>
          <?php for($i=1 ; $i<=$numOfPages ; $i++):?>
            <a href="<?=BASE_URL.'posts/'.$i?>"> <?=$i?> </a>
          <?php endfor; ?>
        </center>
      </div>
</div>

<?php require_once(APP . 'views/footer.php');
