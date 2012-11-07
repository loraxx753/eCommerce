<?php

class Login_Controller {

	public function action_index() 
	{
		
	}

	public function action_register()
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
			Auth::login($name, $pass_alpga);
		}
		
		if(isset($response['error']))
		{
			unset($_POST['pass_alpha']);
			unset($_POST['pass_beta']);
			return $response;
		}
		

		//unset post variables for registration 
		unset($_POST['name']);
		unset($_POST['email']);
		unset($_POST['pass_alpha']);
		unset($_POST['pass_beta']);

		return $response; 
	}

	public function action_login()
	{
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$response = Auth::login($name, $pass);
		return $response; 
	}

	public function action_logout()
	{
		$response = Auth::logout();
		return $response;
	}
}