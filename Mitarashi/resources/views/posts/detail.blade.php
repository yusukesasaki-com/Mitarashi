<?php function h($s) { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); } ?>
<?php if(empty($post)) : ?>

  <p>指定された記事が見つかりません。</p>

<?php else : ?>

  <?php

    $json = json_encode($post);
    header( "Content-Type: application/json; charset=utf-8" ) ;
    echo $json;
    exit;
  ?>

<?php endif; ?>
