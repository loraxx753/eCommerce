<?php

namespace Baughss\Core;

/**
 * Class to get items from the database.
 */
class Database {
	/**
	 * The current pdo connection
	 * @var class PDO
	 */
	public $pdo;

	/**
	 * Opens a connection to the database
	 * @return class PDO class
	 */
	private static function dbConnect()
	{
		$database = Config::find('database');
		$user     = Config::find('dbUser');
		$password = Config::find('dbPassword');
		return new \PDO("mysql:host=localhost;dbname=$database", "$user", "$password");
	}
	/**
	 * Executes a query on the database
	 * @param  string  $query  Query to run
	 * @return class          PDO handler
	 */
	public static function query($query)
	{
		$pdo = self::dbConnect();
		$sth = $pdo->prepare($query);
		$sth->execute();
		$pdo = NULL;
		return $sth;
	} 
}