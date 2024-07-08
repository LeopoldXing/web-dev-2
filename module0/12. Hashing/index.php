<?php
$password = "1234";
print($password . "\n");
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
print($hashed_password . "\n");
print(password_verify($password, $hashed_password) . "\n");
print(password_verify("123", $hashed_password));
