<?php
$db = require('connect.php');

if ($_POST && !empty($_POST['title']) && !empty($_POST['content'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "INSERT INTO posts (title, content, date) VALUES (:title, :content)";
    $statement = $db->prepare($query);

    $statement->bindValue(':title', $title);
    $statement->bindValue(':content', $content);
    $statement->bindValue(':title', $title);

    try {
        if($statement->execute()) {
            http_response_code(201);
            $redirectUrl = "http://localhost:3000/";
            header("Location: $redirectUrl");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
