<?php

namespace Baughss\Core;
/**
 * Error handler class
 */
class Error {
	/**
	 * Adds an error to the handler
	 * @param string $message Error message
	 */
	public function add($message)
	{
		if(!$_SESSION['errors'])
		{
			$_SESSION['errors'] = array();
		}
		$_SESSION['errors'][]=$message;
	}
	/**
	 * Displays current errors
	 */
	public function display()
	{
		if(isset($_SESSION['errors']) == 0)
		{
			return false;
		}
		echo "<ul class='errors'>";
		foreach($_SESSION['errors'] as $value)
		{
			echo "<li>".$value."</li>";
		}
		echo "</ul>";
		unset($_SESSION['errors']);
	}
	/**
	 * Adds a key to the error keys
	 * @param string $key Key to add
	 */
	public function addKey($key)
	{
		if(!$_SESSION['error_keys'])
		{
			$_SESSION['error_keys'] = array();
		}
		$_SESSION['error_keys'][] = $key;
	}
	/**
	 * Finds all error keys
	 * @return array The error keys
	 */
	public function findKeys()
	{
		$result = $_SESSION['error_keys'];
		unset($_SESSION['error_keys']);
		return $result;
	}
}