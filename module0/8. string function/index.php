<?php
$username = "   Disco Broccoli";
// to lower case
print(strToLower($username) . "\n");

// to upper case
print(strToUpper($username) . "\n");

// trim
print(trim($username) . "\n");

// add char
print(str_pad($username, 30, "*", STR_PAD_LEFT) . "\n");

// replace
print(str_replace(" ", "-", $username) . "\n");

// reverse
print(strrev($username) . "\n");

// shuffle
print(str_shuffle($username) . "\n");

// compare
print(strcmp($username, $username) . "\n");
print(strcmp($username, "Disco Broccoli") . "\n");
print(strcmp($username, "1234") . "\n");

// get len
print(strlen($username) . "\n");

// get position of substr
print(strpos($username, "Disco") . "\n");

// get substr
print(substr($username, 4, 5) . "\n");
print(substr($username, 4) . "\n");

// split
print_r(explode("o", $username));

// aggregate
print(implode(["Disco", " ", "Broccoli"]) . "\n");
print(implode(" ", ["Disco", "Broccoli"]) . "\n");
