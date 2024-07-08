<?php

class Car
{
    // Properties
    private $make;
    private $model;
    private $year;
    private $color;
    private $mileage;
    private $fuelType;
    private $fuelLevel;
    private $engineStatus;

    // Constructor
    public function __construct($make, $model, $year, $color, $fuelType) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->mileage = 0;
        $this->fuelType = $fuelType;
        $this->fuelLevel = 100;
        $this->engineStatus = false;
    }

    // Method to get car information
    public function getCarInfo() {
        return [
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'color' => $this->color,
            'mileage' => $this->mileage,
            'fuelType' => $this->fuelType,
            'fuelLevel' => $this->fuelLevel,
            'engineStatus' => $this->engineStatus ? 'On' : 'Off'
        ];
    }

    // Method to start the engine
    public function startEngine() {
        if ($this->fuelLevel > 0) {
            $this->engineStatus = true;
            echo "Engine started.\n";
        } else {
            echo "Cannot start engine. Fuel level is too low.\n";
        }
    }

    // Method to stop the engine
    public function stopEngine() {
        $this->engineStatus = false;
        echo "Engine stopped.\n";
    }

    // Method to drive the car
    public function drive($distance) {
        if ($this->engineStatus) {
            $fuelNeeded = $distance / 10; // Assume 1 unit of fuel is needed for every 10 km
            if ($this->fuelLevel >= $fuelNeeded) {
                $this->mileage += $distance;
                $this->fuelLevel -= $fuelNeeded;
                echo "Drove $distance kilometers.\n";
            } else {
                echo "Not enough fuel to drive $distance kilometers.\n";
            }
        } else {
            echo "Cannot drive. Engine is off.\n";
        }
    }

    // Method to refuel the car
    public function refuel($amount) {
        $this->fuelLevel += $amount;
        if ($this->fuelLevel > 100) {
            $this->fuelLevel = 100;
        }
        echo "Refueled $amount units. Fuel level is now $this->fuelLevel.\n";
    }

    // Method to repaint the car
    public function paint($newColor) {
        $this->color = $newColor;
        echo "Car painted $newColor.\n";
    }

    // Method to start the engine
    public function start() {
        if ($this->fuelLevel > 0) {
            $this->engineStatus = true;
            echo "Engine started.\n";
        } else {
            echo "Cannot start engine. Fuel level is too low.\n";
        }
    }

    // Method to stop the engine
    public function stop() {
        $this->engineStatus = false;
        echo "Engine stopped.\n";
    }
}
