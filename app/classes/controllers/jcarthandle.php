<?php

class Jcarthandle_Controller extends Controller
{
	public static function action_configloader()
	{
		$_SESSION['jcart']->config_loader(true);
	}
	public static function action_relay()
	{
		header('Content-type: text/html; charset=utf-8');
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
		// Process input and return updated cart HTML
		$jcart->display_cart();
	}
	public static function action_gateway()
	{
		$jcart = $_SESSION['jcart'];
		$config = $jcart->config;

		// The update and empty buttons are displayed when javascript is disabled 
		// Re-display the cart if the visitor has clicked either button
		if ($_POST['jcartUpdateCart'] || $_POST['jcartEmpty']) {

			// Update the cart
			if ($_POST['jcartUpdateCart']) {
				if ($jcart->update_cart() !== true)	{
					$_SESSION['quantityError'] = true;
				}
			}

			// Empty the cart
			if ($_POST['jcartEmpty']) {
				$jcart->empty_cart();
			}

			// Redirect back to the checkout page
			$protocol = 'http://';
			if (!empty($_SERVER['HTTPS'])) {
				$protocol = 'https://';
			}

			header('Location: ' . $protocol . $_SERVER['HTTP_HOST'] . $config['checkoutPath']);
			exit;
		}

		// The visitor has clicked the PayPal checkout button
		else {

			////////////////////////////////////////////////////////////////////////////
			/*

			A malicious visitor may try to change item prices before checking out.

			Here you can add PHP code that validates the submitted prices against
			your database or validates against hard-coded prices.

			The cart data has already been sanitized and is available thru the
			$jcart->get_contents() method. For example:

			foreach ($jcart->get_contents() as $item) {
				$itemId	    = $item['id'];
				$itemName	= $item['name'];
				$itemPrice	= $item['price'];
				$itemQty	= $item['qty'];
			}

			*/
			////////////////////////////////////////////////////////////////////////////

			// For now we assume prices are valid
			$validPrices = true;

			////////////////////////////////////////////////////////////////////////////

			// If the submitted prices are not valid, exit the script with an error message
			if ($validPrices !== true)	{
				die($config['text']['checkoutError']);
			}

			// Price validation is complete
			// Send cart contents to PayPal using their upload method, for details see: http://j.mp/h7seqw
			elseif ($validPrices === true) {
				// Paypal count starts at one instead of zero
				$count = 1;
				
				// Build the query string
				$queryString  = "?cmd=_cart";
				$queryString .= "&upload=1";
				$queryString .= "&charset=utf-8";
				$queryString .= "&currency_code=USD";
				$queryString .= "&business=" . urlencode($config['paypal']['id']);
				$queryString .= "&return=" . urlencode($config['paypal']['returnUrl']);
				$queryString .= '&notify_url=' . urlencode($config['paypal']['notifyUrl']);
				
				foreach ($jcart->get_contents() as $item) {

					$queryString .= '&item_number_' . $count . '=' . urlencode($item['id']);
					$queryString .= '&item_name_' . $count . '=' . urlencode($item['name']);
					$queryString .= '&amount_' . $count . '=' . urlencode($item['price']);
					$queryString .= '&quantity_' . $count . '=' . urlencode($item['qty']);

					// Increment the counter
					++$count;
				}

				// Empty the cart
				$jcart->empty_cart();

				// Confirm that a PayPal id is set in config.php
				if ($config['paypal']['id']) {

					// Add the sandbox subdomain if necessary
					$sandbox = '';
					if ($config['paypal']['sandbox'] === true) {
						$sandbox = '.sandbox';
					}

					// Use HTTPS by default
					$protocol = 'https://';
					if ($config['paypal']['https'] == false) {
						$protocol = 'http://';
					}

					// Send the visitor to PayPal
					@header('Location: ' . $protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString);
				}
				else {
					die('Couldn&rsquo;t find a PayPal ID in <strong>config.php</strong>.');
				}
			}
		}		
	}
}