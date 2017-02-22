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
				<option value="Route 29">Route 29</option>
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
include_once('VehicleDb.php');

$resultArray = [];

$vehicleDb = new VehicleDb();
$result = $vehicleDb->getAllVehicles();

while ($row = $result->fetch_assoc()) {
	$resultArray[] = $row;
}

for ($i = 0; $i < sizeof($resultArray); $i++) {
	switch ($i) {
		case 0:
			global $minibus;
			$minibus = new Motorized(
				$resultArray[$i]['mfr'],
				$resultArray[$i]['country'],
				$resultArray[$i]['name'],
				$resultArray[$i]['model'],
				$resultArray[$i]['launchYear'],
				$resultArray[$i]['price'],
				$resultArray[$i]['image'],
				$resultArray[$i]['engine'],
				$resultArray[$i]['fuel'],
				$resultArray[$i]['topSpeed'],
				$resultArray[$i]['economy'],
				$resultArray[$i]['power'],
				$resultArray[$i]['fuelCapacity']
			);
			break;
		case 1:
			global $car;
			$car = new Motorized(
				$resultArray[$i]['mfr'],
				$resultArray[$i]['country'],
				$resultArray[$i]['name'],
				$resultArray[$i]['model'],
				$resultArray[$i]['launchYear'],
				$resultArray[$i]['price'],
				$resultArray[$i]['image'],
				$resultArray[$i]['engine'],
				$resultArray[$i]['fuel'],
				$resultArray[$i]['topSpeed'],
				$resultArray[$i]['economy'],
				$resultArray[$i]['power'],
				$resultArray[$i]['fuelCapacity']
			);
			break;
		case 2:
			global $bicycle;
			$bicycle = new NonMotorized(
				$resultArray[$i]['mfr'],
				$resultArray[$i]['country'],
				$resultArray[$i]['name'],
				$resultArray[$i]['model'],
				$resultArray[$i]['launchYear'],
				$resultArray[$i]['price'],
				$resultArray[$i]['image']
			);
			break;
	}
}


function minibusDetails()
{
	global $minibus;
	echo 'Image: ' . '<img src="' . $minibus->image . '" height="200" width="200" />' . '<br>';
	echo 'Manufacturer: ' . $minibus->manufacturer . '<br>';
	echo 'Country: ' . $minibus->country . '<br>';
	echo 'Type: ' . $minibus->type . '<br>';
	echo 'Model: ' . $minibus->model . '<br>';
	echo 'Launch Year: ' . $minibus->launchYear . '<br>';
	echo 'Price: ' . $minibus->price . '<br>';
	echo 'fuelCapacity: ' . $minibus->fuelCapacity . ' gallons<br>';
	echo 'engine: ' . $minibus->engine . '<br>';
	echo 'fuel: ' . $minibus->fuel . '<br>';
	echo 'topSpeed: ' . $minibus->topsSpeed . ' mph<br>';
	echo 'economy: ' . $minibus->economy . ' mpg<br>';
	echo 'power: ' . $minibus->power . ' bhp<br>';
	echo 'torque:' . $minibus->range() . 'lb ft<br><br>';
}

function carDetails()
{
	global $car;
	echo 'Image: ' . '<img src="' . $car->image . '" height="200" width="200" />' . '<br>';
	echo 'Manufacturer: ' . $car->manufacturer . '<br>';
	echo 'Country: ' . $car->country . '<br>';
	echo 'Type: ' . $car->type . '<br>';
	echo 'Model: ' . $car->model . '<br>';
	echo 'Launch Year: ' . $car->launchYear . '<br>';
	echo 'Price: ' . $car->price . '<br>';
	echo 'fuelCapacity: ' . $car->fuelCapacity . ' gallons<br>';
	echo 'engine: ' . $car->engine . '<br>';
	echo 'fuel: ' . $car->fuel . '<br>';
	echo 'topSpeed: ' . $car->topsSpeed . ' mph<br>';
	echo 'economy: ' . $car->economy . ' mpg<br>';
	echo 'power: ' . $car->power . ' bhp<br>';
	echo 'torque: ' . $car->range() . 'lb ft<br><br>';
}

function bicycleDetails()
{
	global $bicycle;
	echo 'Image: ' . '<img src="' . $bicycle->image . '" height="200" width="200" />' . '<br>';
	echo 'Manufacturer: ' . $bicycle->manufacturer . '<br>';
	echo 'Country: ' . $bicycle->country . '<br>';
	echo 'Model: ' . $bicycle->model . '<br>';
	echo 'Launch Year: ' . $bicycle->launchYear . '<br>';
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
		case 'Route 29':
			bicycleDetails();
			break;
	}
} else {
	minibusDetails();
	carDetails();
	bicycleDetails();
}


?>





