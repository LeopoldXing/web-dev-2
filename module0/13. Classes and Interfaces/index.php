<?php
// Include the Car class
require_once 'Car.php';
require_once "Toyota.php";

// Usage example
$myCar = new Car('Toyota', 'Corolla', 2020, 'Red', 'Gasoline');
print_r($myCar->getCarInfo());
$myCar->startEngine();
$myCar->drive(50);
$myCar->refuel(20);
$myCar->paint('Blue');
print_r($myCar->getCarInfo());
$myCar->stopEngine();

// Usage example
$myToyota = new Toyota('Corolla', 2020, 'Red', 'Gasoline', 5);
print_r($myToyota->getCarInfo());
echo $myToyota->getWarrantyInfo();

// Usage example
$myCar->start();
$myCar->drive(50);
$myCar->refuel(20);
$myCar->stop();
