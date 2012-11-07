<?php

namespace Baughss\Core;

/**
 * Handles getting items out of the config file.
 */
class Config {
	/**
	 * Finds an item in the config array.
	 *
	 * If the config file doesn't exist, display error.
	 * @param  string $item Item to find
	 * @return string       Item's value
	 */
    public static function find($item)
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
			echo "The config file doesn't exist! You have to make that before you continue!<br/><br>Go to <code>".BASE."config/custom/</code> and save a <strong>COPY</strong> of <code>template.config.php</code> as <code>config.php</code>.";
			echo "<br/><br/>";
			echo "Read the comments on config.php and go to <code>http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."setup</code> to setup your database.";
			die();
		}
	}
}