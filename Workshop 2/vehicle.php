<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Vehicle</title>
	</head>
	<body>
		<form action="./vehicle.php" method="get">
			<select name="model">
				<option value="">Choose Model</option>
				<option value="LPG Coaster">LPG Coaster</option>
				<option value="Evora S">Evora S</option>
			</select>
			<button type="submit">Submit</button>
		</form>
		<br>
	</body>
</html>

<?php
include_once('LandVehicle.php');
include_once('Motorized.php');
include_once('NonMotorized.php');

$minibus = new Motorized('Toyota', 'Japan', 'bus', 'LPG Coaster', '2007', 'HK$501,000', 'Minibus.JPG', 'Toyata L4 OHV', 'gas', 110, 2, 6, 113, 122);
$car = new Motorized('Lotus', 'Great Britain', 'car', 'Evora S', '2010', '£48550 to £57550', 'lotus-evora-s.jpg', 'Toyata V6', 'petrol', 172, 27.1, 350, 12);
$bicycle = new NonMotorized('Mountain Goat', 'United States', '', 'Route 29', '2009', '$700', 'Route29.jpg');


function minibusDetails()
{
	global $minibus;
	echo 'Manufacturer: ' . $minibus->manufacturer . '<br>';
	echo 'Country: ' . $minibus->country . '<br>';
	echo 'Type: ' . $minibus->type . '<br>';
	echo 'Model: ' . $minibus->model . '<br>';
	echo 'Launch Year: ' . $minibus->launchYear . '<br>';
	echo 'Image: ' . '<img src="' . $minibus->image . '" height="200" width="200" />' . '<br>';
	echo 'Price: ' . $minibus->price . '<br>';
	echo 'fuelCapacity: ' . $minibus->fuelCapacity . ' gallons<br>';
	echo 'engine: ' . $minibus->engine . '<br>';
	echo 'fuel: ' . $minibus->fuel . '<br>';
	echo 'topSpeed: ' . $minibus->topsSpeed . ' mph<br>';
	echo 'economy: ' . $minibus->economy . ' mpg<br>';
	echo 'power: ' . $minibus->power . ' bhp<br>';
	echo 'torque: 226lb ft<br><br>';
}

function carDetails()
{
	global $car;
	echo 'Manufacturer: ' . $car->manufacturer . '<br>';
	echo 'Country: ' . $car->country . '<br>';
	echo 'Type: ' . $car->type . '<br>';
	echo 'Model: ' . $car->model . '<br>';
	echo 'Launch Year: ' . $car->launchYear . '<br>';
	echo 'Image: ' . '<img src="' . $car->image . '" height="200" width="200" />' . '<br>';
	echo 'Price: ' . $car->price . '<br>';
	echo 'fuelCapacity: ' . $car->fuelCapacity . ' gallons<br>';
	echo 'engine: ' . $car->engine . '<br>';
	echo 'fuel: ' . $car->fuel . '<br>';
	echo 'topSpeed: ' . $car->topsSpeed . ' mph<br>';
	echo 'economy: ' . $car->economy . ' mpg<br>';
	echo 'power: ' . $car->power . ' bhp<br>';
	echo 'torque: 295lb ft<br><br>';
}

function bicycleDetails()
{
	global $bicycle;
	echo 'Manufacturer: ' . $bicycle->manufacturer . '<br>';
	echo 'Country: ' . $bicycle->country . '<br>';
	echo 'Model: ' . $bicycle->model . '<br>';
	echo 'Launch Year: ' . $bicycle->launchYear . '<br>';
	echo 'Image: ' . '<img src="' . $bicycle->image . '" height="200" width="200" />' . '<br>';
	echo 'Price: ' . $bicycle->price . '<br>';
}

if (isset($_GET['model']) && $_GET['model'] != '') {
	switch ($_GET['model']) {
		case 'LPG Coaster':
			minibusDetails();
			break;
		case 'Evora S':
			carDetails();
			break;
	}
} else {
	minibusDetails();
	carDetails();
	bicycleDetails();
}
?>





