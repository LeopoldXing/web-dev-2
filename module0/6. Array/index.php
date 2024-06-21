<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1. Variable & Datatype</title>
</head>
<body>

<?php

/*  append element at the end  */
$numbers = [1, 2, 3];
print_r($numbers);
echo "<br>";
$numbers[] = 4;
print_r($numbers);
echo "<br>";
/*  or use array_push() function(only use on index arrays)  */
array_push($numbers, 5, 6, 7, 8);
print_r($numbers);

echo "<br>";

/*  insert element  */
$fruits = ["apple", "banana", "raspberry"];
print_r($fruits);
echo "<br>";
array_splice($fruits, 1, 0, "Mango");
print_r($fruits);

echo "<br>";

/*  insert another array  */
print_r($fruits);
echo "<br>";
$another_array = ["blackberry", "orange"];
array_splice($fruits, 1, 0, $another_array);
print_r($fruits);

echo "<br>";

/*  delete element  */
array_splice($fruits, 2, 1);
print_r($fruits);

echo "<br>";

/*  remove element, and leave it blank(undefined)  */
unset($numbers[3]);
echo $numbers[3];

echo "<br>";

/*  assign labels to array element  */
$tasks = [
    "laundry" => "Daniel",
    "trash" => "Frida",
    "vacuum" => "Bella"
];
echo $tasks["laundry"];

echo "<br>";

/*  print array  */
print_r($tasks);

echo "<br>";

/*  count() function  */
echo count($tasks);

echo "<br>";

/*  sorting an array(default asc)  */
$numbers = [5, 4, 3, 2, 1];
print_r($numbers);
echo "<br>";
sort($numbers);
print_r($numbers);

/*  delete the first element in an array  */
/*  array_shift($numbers);  */

/*
 * return a new array contains the reversed original array
 * $new_array = array_reverse($original_array);
 * */

/*
 * switch key and value
 * $new_array = array_flip($original_array);
 */

?>

</body>
</html>
