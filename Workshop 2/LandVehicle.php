<?php


class LandVehicle
{
	private $manufacturer;
	private $country;
	private $type;
	private $model;
	private $launchYear;
	private $price;
	private $image;

	/**
	 * LandVehicle constructor.
	 * @param $manufacturer
	 * @param $country
	 * @param $type
	 * @param $model
	 * @param $launchYear
	 * @param $price
	 */
	public function __construct($manufacturer, $country, $type, $model, $launchYear, $price, $image)
	{
		$this->manufacturer = $manufacturer;
		$this->country = $country;
		$this->type = $type;
		$this->model = $model;
		$this->launchYear = $launchYear;
		$this->price = $price;
		$this->image = $image;
	}


	public function __get($property)
	{
		return $this->$property;
	}

	public function __set($property, $method)
	{
		$this->$property = $method;
	}

}

