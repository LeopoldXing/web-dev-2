<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: June 21, 2024
 * Description: php file for Posting operation
 ****************/

require('authenticate.php');

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog Post!</title>
  </head>
  <body>
  <!-- Remember that alternative syntax is good and html inside php is bad -->
  <div id="wrapper">
    <div id="header">
      <h1><a href="./index.php">Leopold's Post Board</a></h1>
    </div>
    <ul id="menu">
      <li><a href="./index.php">Home</a></li>
      <li><a href="./post.php" class="active">New Post</a></li>
    </ul>
    <div id="all_blogs">
      <form action="./process_post.php" method="post">
        <fieldset>
          <legend>New Blog Post</legend>
          <p>
            <label for="title">Title</label>
            <input name="title" id="title">
          </p>
          <p>
            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea>
          </p>
          <p>
            <input type="submit" name="command" value="Create">
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
