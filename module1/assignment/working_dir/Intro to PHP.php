<?php

/*******w********
 *
 * Name: Luping Xing
 * Date: 19 May, 2024
 * Description: Assignment 1 of Web Dev 2 course
 ****************/

$config = [

    'gallery_name' => 'Leopold\' s Gallery',

    'unsplash_categories' => ['Travel', 'Animals', 'Nature', 'Business', 'Fashion', 'Sports'],

    'local_images' => [
        "philipp-kammerer-Travel.jpg",
        "sanjoy-saha-Animals.jpg",
        "v2osk-Nature.jpg",
        "israel-andrade-Business.jpg",
        "dami-adebayo-Fashion.jpg",
        "markus-spiske-Sports.jpg"
    ],

    "imageInfoList" => [
        "philipp-kammerer-Travel.jpg" => ["Eva Darron", "https://unsplash.com/@evadarron"],
        "sanjoy-saha-Animals.jpg" => ["sanjoy saha", "https://unsplash.com/@rupam118"],
        "v2osk-Nature.jpg" => ["v2osk", "https://unsplash.com/@v2osk"],
        "israel-andrade-Business.jpg" => ["Israel Andrade", "https://unsplash.com/@israelandrxde"],
        "dami-adebayo-Fashion.jpg" => ["Dami Adebayo", "https://unsplash.com/@dammypayne"],
        "markus-spiske-Sports.jpg" => ["Markus Spiske", "https://unsplash.com/@markusspiske"]
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
  <title><?php echo $config["gallery_name"] ?></title>
</head>
<body>
<!-- Remember that alternative syntax is good and html inside php is bad -->
<h1><?php echo $config["gallery_name"] ?></h1>
<div id="gallery">
    <?php
    foreach ($config['unsplash_categories'] as $index => $category) {
        echo "<div><h2>$category</h2><img src=\"https://source.unsplash.com/300x200/?'.$category.'\" alt=\"{$category}\"></div>";
    }
    ?>
</div>
<h1><?php echo count($config["local_images"]) ?> Large Images</h1>
<div id="large-images">
    <?php
    $output = '';
    foreach ($config["imageInfoList"] as $key => $imageInfo) {
        $output .= "<img src='./images/$key' alt='" . $key . "'>";
        $output .= '<h3 class="photographer"><a href="' . $imageInfo[1] . '">' . $imageInfo[0] . '</a></h3>';
    }
    echo $output;
    ?>
</div>
</body>
</html>
