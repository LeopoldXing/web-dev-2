<?php
// set cookie
setcookie("cookie-name", "cookie-value", time() + (86400 * 30), "/");
setcookie("fav-food", "pizza", time() + (86400 * 30), "/");

foreach ($_COOKIE as $key => $value) {
    echo $key . ": " . $value . "<br>";
}

// set session
$_SESSION["username"] = "Disco Broccoli";
$_SESSION["password"] = "1234";

print($_SESSION["username"] . "\n");
print($_SESSION["password"] . "\n");
session_destroy();
// header("Location: https://www.google.com");
