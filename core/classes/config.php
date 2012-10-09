<?php

class Config {
	public function find($item)
	{
		if(file_exists(BASE.'app/config/config.php'))
		{
			$config = include BASE.'app/config/config.php';
			return $config[$item];
		}
		else
		{
			echo "The config file doesn't exist! You have to make that before you continue!";
		}
	}
}