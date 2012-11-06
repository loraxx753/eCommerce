<?php

namespace Baughss\Core;
/**
 * Loads the view for the controllers
 */
class Render
{

	public function __construct($varArray = array())
	{
		$this->varArray = $varArray;
		$this->template = APPBASE.'views/template.php';
	}
	/**
	 * Adds a variable that will be used on the view.
	 * @param string $varName  Name for the variable to use.
	 * @param string $varValue Value for the variable
	 */
	public function addVar($varName, $varValue)
	{
		$this->varArray[$varName] = $varValue;
	}
	/**
	 * Loads a particular view
	 * @param  string $type Folder location
	 * @param  string $page Page name
	 * @return  void
	 */
	public function load($type, $page)
	{
		foreach($this->varArray as $key => $value)
		{
			${$key} = $value;
		}
		$page_location = APPBASE.'views/'.$type.'/'.$page.'.php';
		require_once($this->template);
	}
	/**
	 * Changed the template for a particular render
	 * @param  string $loc New location of the template
	 * @return void
	 */
	public function changeTemplate($loc)
	{
		$this->template = APPBASE.'views/'.$loc.'.php';
	}
}