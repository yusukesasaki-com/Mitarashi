<?php function h($s) { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); } ?>
<?php if(empty($posts)) : ?>

  <p>現在記事がありません。</p>

<?php else : ?>

  <ul>
    <?php foreach ($posts as $post) : ?>
      <li><a href="#"><?php echo date("Y/m/d　", strtotime($post["published_at"])) . h($post["title"]); ?></a></li>
    <?php endforeach; ?>
  </ul>

<?php endif; ?>
