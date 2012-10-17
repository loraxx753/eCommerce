<?php

namespace Baughss\Core;

class Config {
	static public function find($item)
	{
		if(file_exists(BASE.'app/config/custom/config.php'))
		{
			$default = include BASE.'app/config/custom/config.php';
			$custom  = include BASE.'app/config/config.php';
			$config  = array_merge($custom, $default);
			return $config[$item];
		}
		else
		{
			echo "The config file doesn't exist! You have to make that before you continue!";
		}
	}
}