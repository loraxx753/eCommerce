<?php

class Cart_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Cart");
		
		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cartArray = array(); 
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}

	public static function action_update($itemID, $newAmount)
	{
		//load cart and grab the current number of an item
		$cart = Shopper::load();
		$currentAmount = $cart->quantity($itemID);

		
		//set new amount to the number of items to be added/removed
		//add or remove that number of specified items and render view
		if($newAmount > $currentAmount)
		{
			$newAmount = $newAmount - $currentAmount;
			for($x=0; $x<$newAmount; $x++)
			{
				$cart->add_item($itemID);
			}
		}
		else if($newAmount < $currentAmount)
		{
			$newAmount = $currentAmount - $newAmount;
			for($x=0; $x<$newAmount; $x++)
			{
				$cart->remove_item($itemID);
			}
		}

		$render = new Render();
		$render->addVar('title', "NWA Furniture | Shopping Cart");
		
		//create array of cart item information pulled from database
		$cartArray = array(); 
		$count = 0; 

		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}

		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}

	public static function action_delete($itemID)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Shopping Cart");

		//create array of cart item information pulled from database
		$cart = Shopper::load();
		$cart->remove_type($itemID);
		$cartArray = array(); 
		$count = 0; 

		//grabbing product information from the database
		foreach($cart -> cart as $key => $value)
		{
			$products = \Model_Products::build();
			$products = $products -> or_where("ProductID", $key);
			$products = $products -> execute();

			$cartArray[$key] = $products;
		}
		
		//create total price
		$total = $cart->subtotal();

		$render->addVar('total', $total);
		$render->addVar('cart', $cart->cart);
		$render->addVar('cartArray', $cartArray);
		$render->load('cart', 'index');
	}

	public static function action_checkout()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Checkout");

		$cart = Shopper::load();

		$total = $cart->subtotal();
		$render->addVar('total', $total);
		
		$shipping = 15;
		$render->addVar('shipping', $shipping);

		$tax = ($cart->subtotal() + 15) *  0.065;
		$render->addVar('tax', $tax);

		$render->load('cart', 'checkout');
	}

	public static function action_paypal()
	{
		$cart = Shopper::load();

		$total = $cart->subtotal();
		$tax = ($cart->subtotal() + 15) *  0.065;
		$total = number_format($total + $tax, 2);

		$shipping = 15;
		
		$net = number_format($total, 2) + $shipping;

		$cancel = 'localhost'.WEB_BASE.'checkout';
		$return = WEB_BASE;
		$base = "https://api-3t.sandbox.paypal.com/nvp?";
		
		$url = $base;

		$url.="USER=nwa_1352355423_biz_api1.gmail.com&";
		$url.="PWD=1352355443&";
		$url.="SIGNATURE=AhkOVhEp.ZNDDIvBMtziApG1jzcBAYnkta3KPlXId.VRVedUS--I0BrW&";
		$url.="VERSION=78&";

		$url.= "METHOD=SetExpressCheckout&";

		$url.= "PAYMENTREQUEST_0_AMT=$net&";
		$url.= "PAYMENTREQUEST_0_SHIPPINGAMT=$shipping&";
		$url.= "PAYMENTREQUEST_0_ITEMAMT=$total&";
		$url.= "PAYMENTREQUEST_0_PAYMENTACTION=SALE&";
		$url.= "PAYMENTREQUEST_0_CURRENCYCODE=USD&";
		
		$url.= "L_PAYMENTREQUEST_0_NAME0=Your%20Purchase&";
		$url.= "L_PAYMENTREQUEST_0_DESC0=Your%20Purchase&";
		$url.= "L_PAYMENTREQUEST_0_AMT0=$total&";
		$url.= "L_PAYMENTREQUEST_0_QTY0=1&";

		$url.= "RETURNURL=http://sulley.cah.ucf.edu/~kbaugh/ecommerce&";
		$url.= "CANCELURL=http://sulley.cah.ucf.edu/~kbaugh/ecommerc/e&";
		

		$url.= "L_BILLINGTYPEn=MerchantInitiatedBilling";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, false);

		$response = curl_exec($ch);

		//var_dump(urldecode($response)); die();

		$response = parse_str($response, $output);

		
		//var_dump($output["TOKEN"]);
		//die();
		header('Location: https://sandbox.paypal.com/webscr?cmd=_express-checkout&token='.urlencode($output["TOKEN"]));

		curl_close($ch);
	}
}