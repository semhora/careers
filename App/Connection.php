<?php namespace app;

class Connection
{
	public static function getDb()
	{
		return new \PDO("mysql:host=localhost;dbname=semhora_test","root","");
	}
}