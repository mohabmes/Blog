<div class="wrapper">
  <div class="footer">
    <?php foreach ($GLOBALS['config']['social'] as $key => $value): ?>
      <?php if(!empty($value)):?>
        <a href="<?=$value?>"><span class="iconify" target="_blank" data-icon="ei-sc-<?=$key?>" data-inline="false"></span></a>
      <?php endif;?>
    <?php endforeach;?>
      <a href="mailto:<?=$GLOBALS['config']['email']?>"><span class="iconify" target="_blank" data-icon="ei:envelope" data-inline="false"></span></span></a>
  </div>
</div>
</body>
</html>
