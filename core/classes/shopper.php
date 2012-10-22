<?php

namespace Baughss\Core;

class Shopper {

	var $cart;

	public function __construct($cart)
	{
		$this->cart = $cart;
	}

	static public function load() {
		if(!Session::get('cart')) {
			Session::set('cart', array());
		}
		return new Cart(Session::get('cart'));
	}

	public function add_item($item_id)
	{
		$this->cart[] = $item_id;
		Session::set('cart', $this->cart);
		return true;
	}

	public function remove_item($item_id) 
	{
		$key = array_search($item_id, $this->cart);
		unset($this->cart[$key]);
		Session::set('cart', $this->cart);
		return true;
	}

	public function clear() 
	{
		$this->cart = array();
		Session::set('cart', array());
		return true;
	}

	public function get()
	{
		$products = \Model_Products::build();
		foreach($this->cart as $item)
		{
			$products->or_where('ProductID', $item);
		}

		return $products->execute();
	}
}