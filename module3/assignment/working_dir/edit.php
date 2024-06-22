<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: June 21, 2024
 * Description: php file for Update operation
 ****************/

require('connect.php');
require('authenticate.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT title, date, id, content FROM posts WHERE id=:id";
$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();

$original_post = $statement->fetch(PDO::FETCH_ASSOC);

if ($original_post === false) {
    echo "Post not found";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Edit this Post!</title>
</head>
<body>
<!-- Remember that alternative syntax is good and html inside php is bad -->
<div id="wrapper">
  <div id="header">
    <h1><a href="./index.php">Leopold's Post Board - Edit Post</a></h1>
  </div>
  <ul id="menu">
    <li><a href="./index.php">Home</a></li>
    <li><a href="./post.php">New Post</a></li>
  </ul>
  <div id="all_blogs">
    <form action="./handle_operation.php" method="post">
      <fieldset>
        <legend>Edit Blog Post</legend>
        <p>
          <label for="title">Title</label>
          <input name="title" id="title" value="<?= $original_post["title"] ?>">
        </p>
        <p>
          <label for="content">Content</label>
          <textarea name="content" id="content"><?= $original_post["content"] ?></textarea>
        </p>
        <p>
          <input type="hidden" name="id" value="<?= $original_post["id"] ?>">
          <input type="submit" name="command" value="Update">
          <input type="submit" name="command" value="Delete" onclick="return confirm(&#39;Are you sure you wish to delete this post?&#39;)">
        </p>
      </fieldset>
    </form>
  </div>
  <div id="footer">
    Copywrong 2024 - No Rights Reserved
  </div>
</div>
</body>
</html>
