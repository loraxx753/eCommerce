<?php

namespace Baughss\Core;

class Query_Insert extends Query {
	// Misc stuff
	var $table;
	var $columns;
	var $values;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	public function columns($columns)
	{
		$this->columns = $columns;
		return $this;
	}
	public function values($values)
	{
		$parsed = array();
		foreach($values as $value)
		{
			if(is_string($value) && $value != "NULL")
			{
				$parsed[] = '"'.$value.'"';
			}
			else
			{
				$parsed[] = $value;
			}
		}
		$this->values = $parsed;
		return $this;
	}
	public function compile()
	{
		$columns = implode(", ",$this->columns);
		$values = implode(", ",$this->values);
		$query = "INSERT INTO $this->table ($columns) VALUES ($values)";
		return $query;
	}
}
