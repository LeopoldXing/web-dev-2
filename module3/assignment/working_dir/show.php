<?php
require('connect.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$query = "SELECT title, date, id, content FROM posts WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
if ($statement && $statement->execute()) {
    $post_data = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Post not found";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Leopold's Post Board - <?= $post_data["title"] ?></title>
  <link rel="stylesheet" href="./main.css" type="text/css">
</head>
<body>
<div id="wrapper">
  <div id="header">
    <h1><a href="./index.php">Leopold's Post Board - <?= $post_data["title"] ?></a></h1>
  </div>
  <ul id="menu">
    <li><a href="./index.php">Home</a></li>
    <li><a href="./post.php">New Post</a></li>
  </ul>
  <div id="all_blogs">
    <div class="blog_post">
      <h2><?= $post_data["title"] ?></h2>
      <p>
        <small>
            <?php
            try {
                $date = new DateTime($post_data["date"]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $formattedDate = $date->format('F d, Y, h:i A');
            echo $formattedDate;
            ?>
          <a href="<?= "./edit.php?id=$id" ?>">edit</a>
        </small>
      </p>
      <div class="blog_content">
          <?= htmlspecialchars($post_data["content"]) ?>
      </div>
    </div>
  </div>
  <div id="footer">
    Copywrong 2024 - No Rights Reserved
  </div>
</div>
</body>
</html>
