<?php
// VehicleInterface.php
interface VehicleInterface {
    public function start();
    public function stop();
    public function drive($distance);
    public function refuel($amount);
}
