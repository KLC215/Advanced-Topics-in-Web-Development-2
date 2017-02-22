<?php


class NonMotorized extends LandVehicle
{
    public function __construct($manufacturer, $country, $type, $model, $launchYear, $price, $image)
    {
		parent::__construct($manufacturer, $country, $type, $model, $launchYear, $price, $image);
	}
  
    public function __get($property)
    {
        return parent::__get($property);
    }
  
    public function __set($name, $value)
	{
		parent::__set($name, $value);
	}
}