<?php

namespace Baughss\Core;
/**
 * Session handler
 */
class Session {
	/**
	 * Gets a value from the session
	 * @param  string $key Key of the session to try
	 * @return mixed      String of the value or false on failure
	 */
	public static function get($key) {
		return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
	}

	/**
	 * Sets a session variable
	 * @param string $key   
	 * @param string $value 
	 */
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
		return true;
	}
	/**
	 * Gets the value for a key, then unsets that variable
	 * @param  string $key 
	 * @return string      the value of the key.
	 */
	public static function get_single($key) {
		if(isset($_SESSION[$key]))
		{ 
			$return = $_SESSION[$key];
			unset($_SESSION[$key]);
			return $return;
		}
	}

	/**
	 * See set()
	 * @param string $key  
	 * @param string $value 
	 */
	public static function set_single($key, $value) {
		return self::set($key, $value);
	}
	/**
	 * Unsets a session variable
	 * @param  string $key 
	 */
	public static function destroy($key)
	{
		unset($_SESSION[$key]);
	}

}