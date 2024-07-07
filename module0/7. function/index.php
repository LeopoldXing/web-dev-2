<?php
function sum($a, $b) {
    return $a + $b;
}

function multiply(int $a, float $b) {
    return intval($a * $b);
}


echo(sum(1, 2));
echo "\n";
echo(multiply(2, 2.3));
