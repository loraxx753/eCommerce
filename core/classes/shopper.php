<?php

namespace Baughss\Core;

class Shopper {

	var $cart;

	public function __construct($cart)
	{
		$this->cart = $cart;
	}
	/**
	 * Loads a new instance of a cart (call this first, like $cart = Shopper::load)
	 * then do all your stuff to $cart
	 * @return class returns a new Shopper class loaded with the cart.
	 */
	static public function load() {
		if(!Session::get('cart')) {
			Session::set('cart', array());
		}
		return new Shopper(Session::get('cart'));
	}

	/**
	 * Adds a new item to the cart.
	 * @param int $item_id the ID of the item that should be added to the cart.
	 */
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

	/**
	 * Removes an item from the cart.
	 * @param  int $item_id  the id of the item to be removed
	 * @return bool          true on removal, false if something goes wrong
	 */
	public function remove_item($item_id) 
	{
		$key = array_search($item_id, $this->cart);
		try {
			unset($this->cart[$key]);
		}
		catch(Exception $e)
		{
			return false;
		}
		Session::set('cart', $this->cart);
		return true;
	}

	/**
	 * Clears the cart of all items
	 * @return bool returns true on removal.
	 */
	public function clear() 
	{
		$this->cart = array();
		Session::set('cart', array());
		return true;
	}

	/**
	 * Gets all of the items currently in the cart.
	 * @return array An array of Model_Product classes that are in the cart.
	 */
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

	/**
	 * Searches the cart for a specific ID
	 * @param  int $search_id The ID to look for within the cart
	 * @return bool           True if the item was found, false if it wasn't.
	 */
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

	/**
	 * Finds the subtotal of all the items in the cart.
	 * @return int The price of all the items in the cart.
	 */
	public function subtotal()
	{
		if(count($this->cart) > 0)
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
		else
		{
			return 0;
		}
	}

}