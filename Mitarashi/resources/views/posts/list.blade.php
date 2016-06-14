<?php function h($s) { return htmlspecialchars($s, ENT_QUOTES, "UTF-8"); } ?>
<?php if(empty($posts)) : ?>

  <p>現在記事がありません。</p>

<?php else : ?>

  <ul>
    <?php if ($item['list_type'] == 0) : ?>

        <?php foreach ($posts as $post) : ?>
            <li><a href="<?php echo h($item["url"]) . "?id=" . $post["id"]; ?>"><?php echo h($post["title"]); ?></a></li>
        <?php endforeach; ?>

    <?php elseif ($item['list_type'] == 1) : ?>

      <?php foreach ($posts as $post) : ?>
        <li>
          <span><?php echo date("Y/m/d　", strtotime($post["published_at"])); ?></span>
          <a href="<?php echo h($item["url"]) . "?id=" . $post["id"]; ?>"><?php echo h($post["title"]); ?></a>
        </li>
      <?php endforeach; ?>

    <?php elseif ($item['list_type'] == 2) : ?>

      <?php foreach ($posts as $post) : ?>
        <li>
          <span><?php echo date("Y/m/d　", strtotime($post["published_at"])); ?></span><br>
          <a href="<?php echo h($item["url"]) . "?id=" . $post["id"]; ?>"><?php echo h($post["title"]); ?></a>
        </li>
      <?php endforeach; ?>

    <?php endif; ?>
  </ul>
<?php endif; ?>
