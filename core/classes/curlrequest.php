<?php

Class CurlRequest {

	private function run($options)
	{
		$ch = curl_init();

		// set URL and other appropriate options

		foreach($options as $constant => $param)
		{
			curl_setopt($ch, $constant, $param);
		}

		// grab URL and pass it to the browser
		$dump = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);

		return $dump;
	}
}

?>