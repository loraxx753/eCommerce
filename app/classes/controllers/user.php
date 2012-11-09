<?php

class User_Controller {

	public static function action_register()
	{	
		//get post data
		$name = $_POST['name'];
		$pass_alpha = $_POST['pass_alpha'];
		$pass_beta = $_POST['pass_beta'];
		$email = $_POST['email'];
		
		//attempt to register the user
		$response = Auth::register($name, $pass_alpha, $pass_beta, $email);

		if(isset($response['success']))
		{
			Auth::login($name, $pass_alpha);
		}
		
		echo json_encode($response); 
	}

	public static function action_login()
	{
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$response = Auth::login($name, $pass);

		echo json_encode($response); 
	}

	public static function action_logout()
	{
		Auth::logout();
		header("Location: ".HOME_LINK_BASE);
	}
}