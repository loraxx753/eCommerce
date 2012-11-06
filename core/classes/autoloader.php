<?php

namespace Baughss\Core;
/**
 * Autoloader class to load all classes nessicary for the framework
 */
class Autoloader {

	/**
	 * An array of classes to add
	 * @var array
	 */
	protected static $classes = array();

	/**
	 * An array of core namespaces
	 * @var array
	 */
	protected static $core_namespaces = array(
		'Baughss\Core',
	);

	/**
	 * Redeclares the autoloder class
	 * @return void
	 */
	public static function start()
	{
		spl_autoload_register('Autoloader::init', true, true);
	}

	/**
	 * Adds classes to the autoloader
	 * @param array $classes
	 */
	public static function add_classes($classes)
	{
		foreach($classes as $class => $path)
		{
			self::$classes[$class] = $path;
		}
	}

	/**
	 * Aliases the classes to the proper namespace
	 * @param  string $class     
	 * @param  string $namespace
	 * @return void
	 */
	public static function alias_to_namespace($class, $namespace = '')
	{
		empty($namespace) or $namespace = rtrim($namespace, '\\').'\\';
		$parts = explode('\\', $class);
		$root_class = $namespace.array_pop($parts);
		class_alias($root_class, $class);
	}

	/**
	 * Aliases core classes to the global namespace
	 * @return void
	 */
	public static function alias_core_classes()
	{
		foreach (self::$classes as $class) {
			$exploded = explode('\\', $class);
			$class = array_pop($exploded);
			$namespace = implode('\\', $exploded);
			self::alias_to_namespace($class, $namespace);
		}
	}

	/**
	 * The actual autoloader
	 * @param  string $class
	 */
	public static function init($class)
	{
		$class = explode('\\', $class);
		$class = array_pop($class);
		$exploded = explode('_', $class);

		if(count($exploded) > 1 && $exploded[1] == "Controller")
		{
			$class = strtolower($exploded[0]);
		}
		else if(count($exploded) > 1 && $exploded[0] == "Model")
		{
			$class = strtolower($exploded[1]);
		}
		else if(count($exploded) > 1)
		{
			$class = strtolower(implode("/", $exploded));
		}
		else
		{
			$class = strtolower($class);
		}
		//If the class name exists in the app controllers, load that class
		if(file_exists(BASE.'app/classes/controllers/'.$class.'.php')) 
		{
			include BASE.'app/classes/controllers/'.$class.'.php';
		}
		//Else if it's in the core classes, load it from there.
		else if(file_exists(BASE.'core/classes/'.$class.'.php')) 
		{
			include BASE.'core/classes/'.$class.'.php';
		}
		//Else if it's in the core classes, load it from there.
		else if(file_exists(BASE.'app/classes/models/'.$class.'.php')) 
		{
			include BASE.'app/classes/models/'.$class.'.php';
		}
	}
}