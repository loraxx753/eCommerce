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
		return new Shopper(Session::get('cart'));
	}

	public function add_item($item_id)
	{
		if(!in_array($item_id, $this->cart))
		{
			$this->cart[] = $item_id;
			Session::set('cart', $this->cart);
			return true;
		}
		else
		{
			return "Item already added.";
		}
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
		if(count($this->cart) > 0)
		{
			$products = \Model_Products::build();
			foreach($this->cart as $item)
			{
				$products->or_where('ProductID', $item);
			}

			return $products->execute();
		}
		else
		{
			return false;
		}
	}

	public function search($search_id)
	{
		if(in_array($search_id, $this->cart))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function subtotal()
	{
		$products = \Model_Products::build();
		foreach($this->cart as $item)
		{
			$products->or_where('ProductID', $item);
		}
		$products->selector('Price');

		$prices = $products->execute();

		$subtotal = 0;

		foreach($prices as $price)
		{
			$subtotal += (int)$price->Price;
		}
		
		return $subtotal;
	}

}