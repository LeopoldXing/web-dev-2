<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: June 21, 2024
 * Description: php file for assignment 3
 ****************/

require('connect.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
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
    <li><a href="https://www.stungeye.com/school/blog/create.php">New Post</a></li>
  </ul>
  <div id="all_blogs">
    <div class="blog_post">
      <h2><a href="https://www.stungeye.com/school/blog/show.php?id=2982">asdADAsdaSD</a></h2>
      <p>
        <small>
          May 25, 2024, 5:59 am -
          <a href="https://www.stungeye.com/school/blog/edit.php?id=2982">edit</a>
        </small>
      </p>
      <div class="blog_content">
        ASFDasdASDAsdASDAsds
      </div>
    </div>
    <div class="blog_post">
      <h2><a href="https://www.stungeye.com/school/blog/show.php?id=2975">lucia</a></h2>
      <p>
        <small>
          May 17, 2024, 4:41 am -
          <a href="https://www.stungeye.com/school/blog/edit.php?id=2975">edit</a>
        </small>
      </p>
      <div class="blog_content">
        232
      </div>
    </div>
    <div class="blog_post">
      <h2><a href="https://www.stungeye.com/school/blog/show.php?id=2974">Hello</a></h2>
      <p>
        <small>
          May 17, 2024, 4:29 am -
          <a href="https://www.stungeye.com/school/blog/edit.php?id=2974">edit</a>
        </small>
      </p>
      <div class="blog_content">
        rrr
      </div>
    </div>
    <div class="blog_post">
      <h2><a href="https://www.stungeye.com/school/blog/show.php?id=2972">Test</a></h2>
      <p>
        <small>
          May 10, 2024, 2:30 pm -
          <a href="https://www.stungeye.com/school/blog/edit.php?id=2972">edit</a>
        </small>
      </p>
      <div class="blog_content">
        Hi this is a test.
      </div>
    </div>
    <div class="blog_post">
      <h2><a href="https://www.stungeye.com/school/blog/show.php?id=2949">shoutout to mom</a></h2>
      <p>
        <small>
          February 20, 2024, 4:56 pm -
          <a href="https://www.stungeye.com/school/blog/edit.php?id=2949">edit</a>
        </small>
      </p>
      <div class="blog_content">
        helloooooooo
      </div>
    </div>
  </div>
  <div id="footer">
    Copywrong 2024 - No Rights Reserved
  </div>
</div>
</body>
</html>
