<?php
include_once ('LandVehicle.php');
include_once ('Motorized.php');
include_once ('NonMotorized.php');


$landVehicle = new LandVehicle('Toyota', 'Japan', 'bus', 'ABCDE', '1999', '9999', 'Minibus.JPG');

$landVehicle->price = '1234';

echo 'Manufacturer: ' . $landVehicle->manufacturer . '<br>';
echo 'Country: ' . $landVehicle->country . '<br>';
echo 'Type: ' . $landVehicle->type . '<br>';
echo 'Model: ' . $landVehicle->model . '<br>';
echo 'Launch Year: ' . $landVehicle->launchYear . '<br>';
echo 'Price: ' . $landVehicle->price . '<br><br>';
echo 'Image: ' . '<img src="' . $landVehicle->image . '" height="200" width="200" />' . '<br><br>';



$motorized = new Motorized('Toyota', 'Japan', 'bus', 'LPG Coaster', '2007', '1234', 'lotus-evora-s.jpg','Toyata L4 OHV', 'gas', 999 , 13, 110, 2.6, 113);

$motorized->price = 'HK$501,000';

echo 'Manufacturer: ' . $motorized->manufacturer . '<br>';
echo 'Country: ' . $motorized->country . '<br>';
echo 'Type: ' . $motorized->type . '<br>';
echo 'Model: ' . $motorized->model . '<br>';
echo 'Launch Year: ' . $motorized->launchYear . '<br>';
echo 'Image: ' . $motorized->image . '<br>';
echo 'Price: ' . $motorized->price . '<br><br>';


$nonMotorized = new NonMotorized('Mountain Goat', 'United States', '', 'Route 29', '2009', '123123', 'Route29.jpg');

$nonMotorized->price = '$700';

echo 'Manufacturer: ' . $nonMotorized->manufacturer . '<br>';
echo 'Country: ' . $nonMotorized->country . '<br>';
echo 'Model: ' . $nonMotorized->model . '<br>';
echo 'Launch Year: ' . $nonMotorized->launchYear . '<br>';
echo 'Price: ' . $nonMotorized->price . '<br><br>';