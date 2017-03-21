<?php


class Connection
{
	private static $db_host     = 'localhost';
	private static $db_user     = 'root';
	private static $db_password = 'root';
	private static $db_name     = 'w6';

	public static function make()
	{
		try {
			return new mysqli(self::$db_host, self::$db_user, self::$db_password, self::$db_name);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
