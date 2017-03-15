<?php


class Connection
{
	private $db_host     = 'localhost';
	private $db_user     = 'root';
	private $db_password = 'root';
	private $db_name     = 'w6';

	public static function make()
	{
		try {
			return new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
