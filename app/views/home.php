<?php $header = title(); require_once(APP . 'views/header.php'); ?>
<div class="wrapper">
    <!-- <p class="title">All Posts</p> -->
      <?php if(!empty($posts)): ?>
          <?php foreach ($posts as $post):?>
            <div class='post'>
                <a href=''>
                  <h3 class='post-title'>The reason we're gathered here on our God-given, much-naeeded day</h3>
                  <img src="<?=IMG . "8.jpg"?>">
                  <p class='post-body'>I can remember about 4 years ago, I started to make HTML templates for ThemeForest. Unfortunately, I failed to pass the quality stage and I was not getting enough feedback from them. I was getting...</p>
                  <p class='post-date'>22 DEC 2015</p>
                </a>
            </div>
          <?php endforeach?>
          <?php foreach ($posts as $post):?>
            <div class='post'>
                <a href=''>
                  <h3 class='post-title'>The reason we're gathered here on our God-given, much-naeeded day</h3>
                  <img src="<?=IMG . "8.jpg"?>">
                  <p class='post-body'>I can remember about 4 years ago, I started to make HTML templates for ThemeForest. Unfortunately, I failed to pass the quality stage and I was not getting enough feedback from them. I was getting...</p>
                  <p class='post-date'>22 DEC 2015</p>
                </a>
            </div>
          <?php endforeach?>
      <?php else: ?>
          <p><center>No post yet</center></p>
      <?php endif;?>

      <div class="pagination clearfix">
        <ul><?php for($i=1 ; $i<=$numOfPages ; $i++) echo pages($i);?></ul>
      </div>

</div>

<?php require_once(APP . 'views/footer.php');
