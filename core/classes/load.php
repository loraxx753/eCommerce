<?php

namespace Baughss\Core;

class Load {
	public static function image($location, $alt)
	{
		return "<img src='".Config::find('base')."public/assets/img/$location' alt='$alt' />";
	}
	public static function css($files = array())
	{
		echo "<style type=\"text/css\">";
		foreach ($files as $file) {
			echo "\n\t\t@import url(\"".Config::find('base')."public/assets/css/".$file."\");";
		}
		echo "\n\t</style>\n";
	}
	public static function js($files = array())
	{
		foreach ($files as $file) {
			if(!preg_match('/^(http|\/\/)/', $file))
			{
				echo '<script src="'.Config::find('base').'public/assets/js/'.$file.'" type="text/javascript"></script>'."\n\t";
			}
			else
			{
				echo '<script src="'.$file.'" type="text/javascript"></script>'."\n\t";
			}
		}
	}
	public static function link($files = array(), $options = array())
	{
		foreach ($files as $location => $description) {
			echo "<a href='".Config::find('base')."$location'";
			if(!empty($options))
			{
				foreach ($options as $attribute => $value) {
					echo " $attribute='$value'";
				}
			}
			echo ">$description</a>";
		}
	}
}