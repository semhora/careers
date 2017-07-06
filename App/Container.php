<?php namespace App;

use App\Connection;

class Container
{
	public static function getModel($model)
	{
		$class = "\\App\\Models\\".ucfirst($model);
		return new $class(Connection::getDb());
	}
}

?>