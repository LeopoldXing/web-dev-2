<?php
require('connect.php');
require('authenticate.php');

date_default_timezone_set('America/Winnipeg');

if ($_POST && !empty($_POST['title']) && !empty($_POST['content']) && isset($_POST['command'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $command = filter_input(INPUT_POST, 'command', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $statement = null;

    switch ($command) {
        case 'Update':
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $query = "UPDATE posts SET title = :title, content = :content, date = CURRENT_TIMESTAMP WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);
            break;
        case 'Delete':
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
            $query = "DELETE FROM posts WHERE id = :id";
            $statement = $db->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);
            break;
        case 'Create':
            $query = "INSERT INTO posts (title, content) VALUES (:title, :content)";
            $statement = $db->prepare($query);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':content', $content);
            break;
    }

    try {
        if ($statement && $statement->execute()) {
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
