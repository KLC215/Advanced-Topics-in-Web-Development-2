<?php


class VehicleDb
{
	private $db;

	private $db_host     = 'localhost';
	private $db_user     = 'root';
	private $db_password = 'root';
	private $db_name     = 'newvehicledb';

	public function __construct()
	{
		$this->db = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);

		if ($this->db->connect_error) {
			die('Connection failed! ' . $db->connect_error);
		}
	}

	public function getAllVehicles()
	{
		$result = $this->db->query(
			'select 
				vehicle.*, 
				vehicleType.name, 
				manufacturer.mfr, 
				country.country
			  from 
			  	vehicle, 
			  	vehicleType, 
			  	manufacturer, 
			  	country 
			  where 
			  	vehicle.type = vehicleType.id and 
				vehicle.manufacturer = manufacturer.id and
				manufacturer.country = country.id'
		);

		if (!$result) {
			die($this->db->error);
		}

		$this->db->close();

		return $result;
	}

}