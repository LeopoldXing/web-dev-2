<?php
require_once 'Car.php';

class Toyota extends Car {
    private $warrantyPeriod;

    // Constructor
    public function __construct($model, $year, $color, $fuelType, $warrantyPeriod) {
        parent::__construct('Toyota', $model, $year, $color, $fuelType);
        $this->warrantyPeriod = $warrantyPeriod;
    }

    // Method to get warranty information
    public function getWarrantyInfo() {
        return "This Toyota has a warranty period of $this->warrantyPeriod years.";
    }

    // Override the getCarInfo method to include warranty information
    public function getCarInfo() {
        $carInfo = parent::getCarInfo();
        $carInfo['warrantyPeriod'] = $this->warrantyPeriod;
        return $carInfo;
    }
}
