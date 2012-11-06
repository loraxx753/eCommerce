<?php

namespace Baughss\Core;
/**
 * Class to encrypt/decrypt values
 */
class Encryption {
	/**
	 * Encrypts a value
	 * @param  string $string Value to be encrypted.
	 * @return string         The encrypted value
	 */
	public function encrypt($string)
	{
		$key = Config::find('salt');
		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
		return $encrypted;

	}
	/**
	 * Decrypts an encrypted string
	 * @param  string $string The encrypted string.
	 * @return string         The decrypted string.
	 */
	public function decrypt($string)
	{
		$key = Config::find('salt');
		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		return $decrypted;
	}
}