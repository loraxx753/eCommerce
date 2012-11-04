<?php

namespace Baughss\Core;

class Login {
	static public function register($username, $password1, $password2, $email) {
		$error = array();
		if(strlen($username) < 5) 
		{
			$error[] = "Username needs to be larger than 5 characters";
		}
		if(strlen($password1) < 5) 
		{
			$error[] = "Password needs to be larger than 5 characters";
		}
		if($password1 != $password2) 
		{
			$error[] = "Passwords do not match.";
		}
		if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.([A-Za-z]{2,4}|museum)$/", $email)) 
		{
			$error[] = "Email address is invalid";
		}

		if(count($error) == 0)
		{
            $time = time();
            $encrypt = sha1($password1.$time);
            // var_dump("INSERT INTO users (user, pass, email, created_at) VALUES ('$username', '$encrypt', '$email', $time)");
			\Database::query("INSERT INTO users (user, pass, email, created) VALUES ('$username', '$encrypt', '$email', $time)");
			return array('success' => 'You have successfully registered.');
		}
		else
		{
			return array('error' => $error);
		}
	}

	static public function login($username, $password)
	{
        $handler = Database::query('SELECT * FROM users WHERE user="'.$username.'"');

        $userInfo = $handler->fetch();

        if(sha1($password.$userInfo['created']) == $userInfo['pass'])
        {
        	Session::set('username', $username);
			Database::query('UPDATE users SET updated='.time().' WHERE user="'.$username.'"');	
            return true;
        }
        else
        {
            return array('error' => "The username and password didn't match");
        }

	}
	static public function logout()
	{
		Session::destroy('username');
		return true;
	}
}