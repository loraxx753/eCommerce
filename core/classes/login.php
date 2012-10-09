<?php

class Login {
	public function verifyCredentials($username, $password)
	{
		$handler = Database::query('SELECT * FROM users WHERE user="loraxx"');

		$userInfo = $handler->fetch();
	
		if(sha1($password.$userInfo['reg_date']) == $userInfo['pass'])
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}