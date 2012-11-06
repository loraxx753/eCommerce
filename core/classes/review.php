<?php

namespace Baughss\Core;
/**
 * Class for the reviews
 *
 * TODO: Move all functionality to model
 */
class Review {
	/**
	 * Adds a review to the database
	 * @param string $review     Text of the review
	 * @param integer $rating    The reviews rating
	 * @param integer $productID What product this is associated with
	 * @return bool              True on success, false on failure
	 */
	public static function add($text, $rating, $productID)
	{
		$review = new \Model_Reviews();
		$review->product_id = $productID;
		$review->review = $text;
		$review->rating = 5;
		$review->user = Session::get('username');
		$review->created = time();

		$review->save();

		return true;
	}
	/**
	 * Gets a list of views for a product
	 * @param  integer $productID The id of the product to find reviews for.
	 * @return array              An array of model objects
	 */
	public static function get($productID)
	{
		return \Model_Reviews::build()->where('product_id', $productID)->execute();
	}
	/**
	 * Returns average rating of a product
	 * @param  integer $productID the id of the product
	 * @return float            The average rating 
	 */
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
	/**
	 * Removes a review from the database
	 * @param  integer $id The id of the review to remove
	 */
	public static function remove($id)
	{
		$review = \Model_Reviews::build()->where('id', $id)->execute();
		$review[0]->delete();
	}
}
