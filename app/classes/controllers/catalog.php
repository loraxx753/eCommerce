<?php

class Catalog_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build()->execute();
		$render->addVar('items', $items);

		$render->load('catalog', 'index');
	}	
	public static function action_catagories($catagory)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->or_where("Category_ID", $catagory);
		$items = $items->execute();

		$render->addVar('items', $items);

		$render->load('catalog', 'index');
	}
	public static function action_price($limit_min, $limit_max = -1)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->execute();

		$range = array();

		foreach ($items as $key => $value) 
		{
			if($value->Product_Price >= $limit_min && $value->Product_Price <= $limit_max && $limit_max != -1)
			{
				$range[$key] = $value;
			}

			if($limit_max == -1 && $value->Product_Price >= $limit_min)
			{
				$range[$key] = $value;
			}
		}

		$render->addVar('items', $range);
		$render->load('catalog', 'index');	
	}
	public static function action_material()
	{
		
	}
	public static function action_add_product()
	{
		var_dump($_FILES);
		// $product = new Model_Products();
		// $product->Product_Name        = $_POST['Product_Name'];
		// $product->SKU                 = $_POST['SKU'];
		// $product->Stock               = $_POST['Stock'];
		// $product->Product_Description = $_POST['Product_Description'];
		// $product->Product_Cost        = $_POST['Product_Cost'];
		// $product->Product_Price       = $_POST['Product_Price'];
		// $product->Weight              = $_POST['Weight'];
		// $product->Size                = $_POST['Size']; 
		// $product->Featured            = ($_POST['Featured']) ? 1 : 0;
		// $product->Weight              = $_POST['Weight'];
	}

	public static function action_weight($limit_min, $limit_max)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		$items = Model_Products::build();
		$items = $items->execute();

		$range = array();

		foreach ($items as $key => $value) 
		{
			if($value->Product_Weight >= $limit_min && $value->Product_Weight <= $limit_max && $limit_max != -1)
			{
				$range[$key] = $value;
			}
		}

		$render->addVar('items', $range);
		$render->load('catalog', 'index');
	}
	public static function action_search($search)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Catalog");

		//initialize variables
		$products = array();

		//split up a trimmed search query into individual words 
		//go through each and compile a list of associated products
		$search = explode(" ", trim($search));

		foreach ($search as $key => $tag)
	 	{
	 		//build new products model and catagories model
	 		$catagories = Model_Catagories::build();

	 		//get collection of items that match the search results
	 		$name = Model_Products::build();
	 		$name = $name->where("LOWER(Product_Name)", "LIKE" ,"%$tag%");
	 		$name = $name->execute();
	 		$description = Model_Products::build();
	 		$description = $description->where("LOWER(Product_Description)", "LIKE" ,"%$tag%");
	 		$description = $description->execute();
	 		
	 		//get the catagory id based on the search term
	 		$catagory_id = $catagories->where("LOWER(name)", "LIKE", "%$tag%");
	 		$catagory_id = $catagory_id->execute();
	 		
	 		//get collection of items based on catagory id or set to false
	 		if($catagory_id)
	 		{
	 			$catagory_id = $catagory_id[0]->catagoryID;
	 			
	 			$catagory = Model_Products::build();
		 		$catagory = $catagory->where("Category_ID", $catagory_id);
		 		$catagory = $catagory->execute();
	 		}
	 		else
	 		{
	 			$catagory = false;
	 		}
	 		
	 		//add all collections of items to an array
	 		$collections = array($name, $description, $catagory);

	 		//go through each set of items and check if a collection exists
	 		//go through each item in the collection and add it to the array if it does not already exist
	 		foreach ($collections as $key => $collection) 
	 		{
	 			if($collection)
	 			{
	 				foreach ($collection as $key => $value) 
	 				{
			 			if(!array_key_exists($value->ProductID, $products))
				 		{
				 			$products[$value->ProductID] = $value;
				 		}
	 				}
	 			}
	 		}
		}
		$render->addVar('term', implode(' ', $search));
		$render->addVar('items', $products);
		$render->load('catalog', 'search');
	}
	public static function action_product($id)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Product");

		$products = \Model_Products::build();
		$products->or_where("ProductID", $id);
		$product = $products->execute();

		$reviews = \Model_Reviews::build()->where('product_id', $product[0]->ProductID)->order_by('id DESC')->execute();

		$totalRating = 0;
		$runningTotal = 0;
		if($reviews)
		{
			foreach ($reviews as $review) {
				$totalRating += (int)$review->rating;
				$runningTotal++;
			}			
			$rating = round($totalRating/$runningTotal);
		}
		else
		{
			$rating = 0;
		}

		$render->addVar('product', $product[0]);
		$render->addVar('reviews', $reviews);
		$render->addVar('rating', $rating);

		$render->load('catalog', 'product');		
	}
	public static function action_cart($item, $quantity)
	{
		$render = new Render();
		$render->addVar('title', "NWA Furniture | Product");

		$cart = Shopper::load();

		for($x=0; $x<$quantity; $x++)
		{
			$cart->add_item($item);
		}

		$products = \Model_Products::build();
		
		$products->or_where("ProductID", $item);
		$product = $products->execute();
		$render->addVar('product', $product[0]);

		$render->load('catalog', 'product');
	}
	public static function action_review($productID)
	{
		$review = new Model_Reviews();

		$review->review = $_POST['review'];
		$review->rating = $_POST['rating'];;
		$review->product_id = $productID;
		$review->user = (Session::get('username')) ? Session::get('username') : 'Guest';
		$review->created = time();

		try
		{
			$review->save();
		}
		catch(Exception $e)
		{
			echo json_encode(array('fail' => false));
			die();
		}
		echo json_encode(array('success'=> $review->user." ".date("n/j/Y h:ia",$review->created)));
	}
}