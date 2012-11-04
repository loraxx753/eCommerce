<?php

class Test_Controller {

	public function action_index() {
		$cart = Shopper::load();
		$cart->add_item(1);
		$cart->add_item(2);
		$cart->subtotal();
		// var_dump($cart);
	}
}