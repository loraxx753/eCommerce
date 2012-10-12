<?php

namespace Baughss\Core;

class Encryption {
	public function encrypt($string)
	{
		$key = Config::find('salt');
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
		return $encrypted;

	}
	public function decrypt($string)
	{
		$key = Config::find('salt');
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $decrypted;
	}
}