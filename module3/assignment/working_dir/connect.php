 <?php
     define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8mb4;port=33306');
     define('DB_USER','root');
     define('DB_PASS','1234');

    //  PDO is PHP Data Objects
    //  mysqli <-- BAD.
    //  PDO <-- GOOD.
     try {
         // add optional config
         $options = [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         ];
         // Try creating new PDO connection to MySQL.
         $db = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
         //,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)

         return $db;
     } catch (PDOException $e) {
         print "Error: " . $e->getMessage();
         die(); // Force execution to stop on errors.
         // When deploying to production you should handle this
         // situation more gracefully. ¯\_(ツ)_/¯
     }
