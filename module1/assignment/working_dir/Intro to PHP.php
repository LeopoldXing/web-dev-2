<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: 19 May, 2024
 * Description: Assignment 1 of Web Dev 2 course
 ****************/

 $config = [
     'gallery_name' => 'Leopold\'s Gallery',
 
     'unsplash_categories' => ['Travel', 'Animals', 'Nature', 'Business', 'Fashion', 'Sports'],
 
     'local_images' => [
         ['filename' => 'philipp-kammerer-Travel.jpg', 'photographer' => 'Eva Darron', 'unsplash_url' => 'https://unsplash.com/@evadarron'],
         ['filename' => 'sanjoy-saha-Animals.jpg', 'photographer' => 'Sanjoy Saha', 'unsplash_url' => 'https://unsplash.com/@rupam118'],
         ['filename' => 'v2osk-Nature.jpg', 'photographer' => 'v2osk', 'unsplash_url' => 'https://unsplash.com/@v2osk'],
         ['filename' => 'israel-andrade-Business.jpg', 'photographer' => 'Israel Andrade', 'unsplash_url' => 'https://unsplash.com/@israelandrxde'],
         ['filename' => 'dami-adebayo-Fashion.jpg', 'photographer' => 'Dami Adebayo', 'unsplash_url' => 'https://unsplash.com/@dammypayne'],
         ['filename' => 'markus-spiske-Sports.jpg', 'photographer' => 'Markus Spiske', 'unsplash_url' => 'https://unsplash.com/@markusspiske']
     ]
 ];
 
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="main.css">
   <title><?php echo $config["gallery_name"]; ?></title>
 </head>
 <body>
 <h1><?php echo $config["gallery_name"]; ?></h1>
 <div id="gallery">
     <?php
     foreach ($config['unsplash_categories'] as $category) {
         echo "<div><h2>$category</h2><img src=\"https://source.unsplash.com/300x200/?$category\" alt=\"$category image\"></div>";
     }
     ?>
 </div>
 <h1><?php echo count($config["local_images"]); ?> Large Images</h1>
 <div id="large-images">
     <?php
     foreach ($config["local_images"] as $image) {
         echo "<div>";
         echo "<img src='./images/{$image['filename']}' alt='{$image['filename']}'>";
         echo "<h3 class='photographer'><a href='{$image['unsplash_url']}'>{$image['photographer']}</a></h3>";
         echo "</div>";
     }
     ?>
 </div>
 </body>
 </html>
 
