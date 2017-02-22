<?php


class Motorized extends LandVehicle
{
	private $engine;
	private $fuel;
	private $topsSpeed;
	private $economy;
	private $power;
	private $fuelCapacity;

	/**
	 * Motorized constructor.
	 * @param $engine
	 * @param $fuel
	 * @param $topsSpeed
	 * @param $economy
	 * @param $power
	 */
	public function __construct($manufacturer, $country, $type, $model, $launchYear, $price, $image, $engine, $fuel, $topsSpeed, $economy, $power, $fuelCapacity)
	{
		parent::__construct($manufacturer, $country, $type, $model, $launchYear, $price, $image);
		$this->engine = $engine;
		$this->fuel = $fuel;
		$this->topsSpeed = $topsSpeed;
		$this->economy = $economy;
		$this->power = $power;
		$this->fuelCapacity = $fuelCapacity;
	}

	public function __get($property)
	{
		if(!preg_match('/engine|fuel|topsSpeed|economy|power/', $property)) {
			return parent::__get($property);
		}
		return $this->$property;

	}

	public function __set($name, $value)
	{
		parent::__set($name, $value);
	}

	public function range()
	{
		return $this->fuelCapacity * $this->economy;
	}

}