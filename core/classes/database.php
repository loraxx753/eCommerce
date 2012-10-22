<?php

namespace Baughss\Core;

class Database {
	
	public $pdo;

	private static function dbConnect()
	{
		$database = Config::find('database');
		$user     = Config::find('dbUser');
		$password = Config::find('dbPassword');
		return new \PDO("mysql:host=localhost;dbname=$database", "$user", "$password");
	}
	public static function query($query, $return = false)
	{
		$pdo = self::dbConnect();
		$sth = $pdo->prepare($query);
		$sth->execute();
		$pdo = NULL;
		return $sth;
	} 
}