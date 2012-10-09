<?php

class Cart_Controller extends Controller
{
	public function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Cart");

		$render->load('cart', 'index');

	}
	public function action_checkout()
	{
		$render = new Render();
		$render->addVar('title', "Ceckout");

		$render->load('cart', 'checkout');

	}
}