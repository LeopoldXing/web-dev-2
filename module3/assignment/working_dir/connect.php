<?php
// Use environment variables to create connection information
$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=utf8mb4;port=%s',
    getenv('MYSQL_HOST') ?: 'localhost',
    getenv('MYSQL_DATABASE_NAME') ?: 'serverside',
    getenv('MYSQL_HOST_PORT') ?: '3306'
);
$user = getenv('MYSQL_USER') ?: 'serveruser';
$password = getenv('MYSQL_PASSWORD') ?: 'gorgonzola7!';

//  PDO is PHP Data Objects
//  mysqli <-- BAD.
//  PDO <-- GOOD.
try {
    // config pbo
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    // Try creating new PDO connection to MySQL.
    $db = new PDO($dsn, $user, $password, $options);
    //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
} catch (PDOException $e) {
    print "Error: " . $e->getMessage();
    die(); // Force execution to stop on errors.
    // When deploying to production you should handle this
    // situation more gracefully. ¯\_(ツ)_/¯
}
?>
