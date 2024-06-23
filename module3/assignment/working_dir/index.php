<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: June 21, 2024
 * Description: php file for assignment 3
 ****************/

require('connect.php');

$query = "SELECT title, date, id, content FROM posts ORDER BY date DESC LIMIT 5";
$statement = $db->prepare($query);

$statement->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./main.css">
  <title>Welcome to my Blog!</title>
</head>
<body>
<!-- Remember that alternative syntax is good and html inside php is bad -->
<div id="wrapper">
  <div id="header">
    <h1><a href="./index.php">Leopold's Post Board</a></h1>
  </div>
  <ul id="menu">
    <li><a href="./index.php" class="active">Home</a></li>
    <li><a href="./post.php">New Post</a></li>
  </ul>
  <div id="all_blogs">
      <?php if ($statement->rowCount() > 0): ?>
          <?php foreach ($statement->fetchAll() as $post): ?>
          <div class="blog_post">
            <h2><a href="<?= "./show.php?id={$post["id"]}" ?>"><?= $post["title"] ?></a></h2>
            <p>
              <small>
                  <?php
                  try {
                      $date = new DateTime($post["date"]);
                  } catch (Exception $e) {
                      echo $e->getMessage();
                  }
                  $formattedDate = $date->format('F d, Y, h:i A');
                  echo $formattedDate;
                  ?>
                <a href="<?= "./edit.php?id={$post["id"]}" ?>">edit</a>
              </small>
            </p>
            <div class="blog_content">
                <?= substr($post["content"], 0, 200) ?><br>
                <?php if (strlen($post["content"]) > 200): ?>
                  ...<a href="<?= "./show.php?id={$post["id"]}" ?>">Read more</a>
                <?php endif ?>
            </div>
          </div>
          <?php endforeach; ?>
      <?php else: ?>
        <p>No recent blog posts available.</p>
      <?php endif; ?>
  </div>
  <div id="footer">
    Copywrong 2024 - No Rights Reserved
  </div>
</div>
</body>
</html>
