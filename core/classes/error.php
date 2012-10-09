<?php
	class Error {
		public function add($message)
		{
			if(!$_SESSION['errors'])
			{
				$_SESSION['errors'] = array();
			}
			$_SESSION['errors'][]=$message;
		}
		public function display()
		{
			if(isset($_SESSION['errors']) == 0)
			{
				return false;
			}
			var_dump($_SESSION['errors']);
			echo "<ul class='errors'>";
			foreach($_SESSION['errors'] as $value)
			{
				var_dump($value);
				echo "<li>".$value."</li>";
			}
			echo "</ul>";
			unset($_SESSION['errors']);
		}
		public function addKey($key)
		{
			if(!$_SESSION['error_keys'])
			{
				$_SESSION['error_keys'] = array();
			}
			$_SESSION['error_keys'][] = $key;
		}
		public function findKeys()
		{
			$result = $_SESSION['error_keys'];
			unset($_SESSION['error_keys']);
			return $result;
		}
	}