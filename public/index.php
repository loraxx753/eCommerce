<?php

namespace Baughss\Core;
// Start a new session
session_start();

//Defines the server base depending on where the public file is.
define("BASE", substr(dirname(__FILE__), 0, -6)); //removes the string "public" 
define("APPBASE", BASE."app".DIRECTORY_SEPARATOR ); //removes the string "public" 
define("COREBASE", BASE."core".DIRECTORY_SEPARATOR ); //removes the string "public" 

// Turn on error reporting and display errors....just in case
// TODO: Move this to the config file so it can be changed on production.
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

//Include the bootstrap to start everything up!
include APPBASE."bootstrap.php";

//Defines the base used for assets.
define("WEB_BASE", Config::find("base"));
if(Config::find('shorttags') == true)
{
	define('LINK_BASE', WEB_BASE);
	define('HOME_LINK_BASE', WEB_BASE);
}
else
{
	define('LINK_BASE', WEB_BASE."public/index.php?url=");
	define('HOME_LINK_BASE', WEB_BASE."public/index.php");
}

if(!isset($_SESSION))
{
	session_start();
}

// Initialize jcart after session start
$jcart = $_SESSION['jcart'];
if(!is_object($jcart)) {
	$jcart = $_SESSION['jcart'] = new Jcart();
}

// Enable request_uri for non-Apache environments
// See: http://api.drupal.org/api/function/request_uri/7
if (!function_exists('request_uri')) {
	function request_uri() {
		if (isset($_SERVER['REQUEST_URI'])) {
			$uri = $_SERVER['REQUEST_URI'];
		}
		else {
			if (isset($_SERVER['argv'])) {
				$uri = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['argv'][0];
			}
			elseif (isset($_SERVER['QUERY_STRING'])) {
				$uri = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'];
			}
			else {
				$uri = $_SERVER['SCRIPT_NAME'];
			}
		}
		$uri = '/' . ltrim($uri, '/');
		return $uri;
	}
}

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
		$preg = "/^$preg/";
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