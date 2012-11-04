<?php

namespace Baughss\Core;

class Review {
	public static function add($review, $rating, $productID)
	{
		try
		{
			\Database::query("INSERT INTO reviews (product_id, rating, review, created) VALUES ($productID, $rating, '$review', ".time().")");
		}
		catch(Exception $e)
		{
			return false;
		}
		return true;
	}
	public static function get($productID)
	{
		return \Model_Reviews::build()->where('product_id', $productID)->execute();
	}
	public static function get_rating($productID)
	{
		$reviews = \Model_Reviews::build()->selector('rating')->where('product_id', $productID)->execute();

		$counter = 0;
		$sum = 0;

		foreach ($reviews as $review) {
			$sum += $review->rating;
			$counter++;
		}
		return round($sum/$counter, 1);

	}
	public static function remove($id)
	{
		\Database::query('DELETE FROM reviews WHERE id='.$id);
	}
}
