<?php

namespace Baughss\Core;

class Auth {
	static public function register($username, $password1, $password2, $email, $access = 1) {
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
			\Database::query("INSERT INTO users (user, pass, email, created, access) VALUES ('$username', '$encrypt', '$email', $time, $access)");
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
	/**
	 * Access levels are ints as follows
	 *
	 * banned = 0
	 * customer = 1
	 * privilege = 2
	 * admin = 3
	 *
	 * @param  int/string an int or a string of the access level to check
	 * @return bool       whether the user has that access level or not
	 */
	static public function check_access($level)
	{

		$user = \Model_Users::build()->where('user', Session::get('username'))->execute();
		if(!is_int($level))
		{
			switch ($level) 
			{
				case 'banned':
					$level = 0;
					break;
				case 'customer':
					$level = 1;
					break;
				case 'privilege':
					$level = 2;
					break;
				case 'admin':
					$level = 3;
					break;
			}
		}
		if(isset($user->access))
		{
			if($user->access == $level)
			{
				return true;
			}
			else
			{
				return false;
			}			
		}
		else
		{
			return false;
		}
	}
}