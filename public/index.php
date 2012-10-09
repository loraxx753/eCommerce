<?php
session_start();

//Defines the server base depending on where the public file is.
define(BASE, substr(dirname(__FILE__), 0, -6)); //removes the string "public" 

//Auto loads the class when referenced	
function __autoload($class_name) {
	
	$exploded = explode('_', $class_name);


	if(count($exploded) > 1 && $exploded[1] == "Controller")
	{
		$class = strtolower($exploded[0]);
	}
	else if(count($exploded) > 1 && $exploded[0] == "Model")
	{
		$model = strtolower($exploded[1]);
	}
	else
	{
		$class = strtolower($class_name);
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
	else if(file_exists(BASE.'app/classes/models/'.$model.'.php')) 
	{
		include BASE.'app/classes/models/'.$model.'.php';
	}
}

//Defines the base used for assets.
define(WEB_BASE, Config::find("base"));

//If the user is at the base location, load the default controller.
if(!isset($_GET['url']))
{
	$defaultController = ucwords(Config::find('defaultController')).'_Controller';
	$defaultAction = 'action_'.Config::find('defaultAction');
	if(class_exists($defaultController) && method_exists($defaultController, $defaultAction))
	{
		$defaultController::$defaultAction();
	}
	//Just in case the default class isn't there...
	else
	{
		echo 'The default class and/or action doesn\'t exist! Check your config file.';
	}
}
//Else it's a regular call to a class.
else 
{
	$data = array();

	//Build the $data variable based on post
	if(isset($_POST))
	{
		foreach($_POST as $key => $value)
		{
			$data[$key] = $value;
		}
	}
	$routes = include BASE."app/config/routes.php";

	$url = $_GET['url'];

	foreach($routes as $preg => $replacement) {
		$preg = "/$preg/";
		if(preg_match($preg, $_GET['url']))
		{
			$url = preg_replace($preg, $replacement, $url);
		}
	}
	//Add the params from get (will come in as param1/param2/param3/, so it needs to be exploded)
	$url = explode('/', $url);

	//Uppercase the word and add controller to the end, so the framework knows you're accessing a controller.
	$type = ucwords(array_shift($url)).'_Controller';
	if(count($url) > 0)
	{
		//Formats the method (prepends it with action_)
		$action = 'action_'.array_shift($url);
		if(count($url) > 0)
		{
			$params = $url;
		}
	}
	else
	{
		$action = 'action_index';
	}
	//If the class doesn't exist throw a 404 error		
	if(!class_exists($type))
	{
		header("HTTP/1.0 404 Not Found");
	}
	//Or else call the class and method with the data.
	else
	{
		if(isset($params))
		{
			call_user_func_array("$type::$action", $params);
		}
		else
		{
			$type::$action();
		}
	}
}