<?php

namespace Baughss\Core;

class Session {

	public static function get($key) {
		return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
	}

	public static function set($key, $value) {
		$_SESSION[$key] = $value;
		return true;
	}

	public static function get_single($key) {
		if(isset($_SESSION[$key]))
		{ 
			$return = $_SESSION[$key];
			unset($_SESSION[$key]);
			return $return;
		}
	}

	public static function set_single($key, $value) {
		return self::set($key, $value);
	}

}