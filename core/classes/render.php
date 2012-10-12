<?php

namespace Baughss\Core;

class Render
{

	public function __construct($varArray = array())
	{
		$this->varArray = $varArray;
		$this->template = APPBASE.'views/template.php';
	}

	public function addVar($varName, $varValue)
	{
		$this->varArray[$varName] = $varValue;
	}
	public function load($type, $page)
	{
		foreach($this->varArray as $key => $value)
		{
			${$key} = $value;
		}
		$page_location = APPBASE.'views/'.$type.'/'.$page.'.php';
		require_once($this->template);
	}
	public function changeTemplate($loc)
	{
		$this->template = APPBASE.'views/'.$loc.'.php';
	}
}