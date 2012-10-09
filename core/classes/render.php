<?php
	class Render
	{

		public function __construct($varArray = array())
		{
			$this->varArray = $varArray;
			$this->template = BASE.'app/views/template.php';
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
			$page_location = BASE.'app/views/'.$type.'/'.$page.'.php';
			require_once($this->template);
		}
		public function changeTemplate($loc)
		{
			$this->template = BASE.'app/views/'.$loc.'.php';
		}
	}