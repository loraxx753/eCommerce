<?php

namespace Baughss\Core;
/**
 * Class to load items that would require urls.
 */
class Load {
	/**
	 * Loads an image from the image assets
	 * @param  string $location Location of the image
	 * @param  string $alt      Alt text for the image
	 * @return string           The completed image tag.
	 */
	public static function image($location, $alt)
	{
		return "<img src='".Config::find('base')."public/assets/img/$location' alt='$alt' />";
	}
	/**
	 * CSS files to load
	 * @param  array  $files Files to load
	 */
	public static function css($files = array())
	{
		echo "<style type=\"text/css\">";
		foreach ($files as $file) {
			echo "\n\t\t@import url(\"".Config::find('base')."public/assets/css/".$file."\");";
		}
		echo "\n\t</style>\n";
	}
	/**
	 * Javascript files to load
	 * @param  array  $files An array of javascript files
	 */
	public static function js($files = array())
	{
		foreach ($files as $file) {
			//If the file is locally hosted
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
	/**
	 * Loads a list of lints
	 * @param  array  $files   an array of locations/descriptions 
	 * @param  array  $options additional options
	 */
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