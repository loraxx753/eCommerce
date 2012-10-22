<?php

class Model_Products
{
	public $ProductID;
	public $Product_Name;
	public $Description;
	public $Category;
	public $SKU;
	public $Stock;
	public $Cost;
	public $Price;
	public $Product_Image;
	public $Featured;

	public static function find($finder = false) {
		$query = "SELECT * FROM products";
		if($finder)
		{
			$query .= " WHERE ".$finder;
		}
		$return = array();
		$items = Database::query($query);
		$items->setFetchMode(PDO::FETCH_CLASS, 'Model_Products');
		while($obj = $items->fetch()) {
			$return[] = $obj;
		}
		if(count($return) > 1)
		{
			return $return;
		}
		else
		{
			return $return[0];
		}
	}
}