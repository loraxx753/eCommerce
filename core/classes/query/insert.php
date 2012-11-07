<?php

namespace Baughss\Core;

/**
 * Insert Builder for the Query Class
 */
class Query_Insert extends Query {
	/**
	 * Columns array
	 * @var array
	 */
	var $columns;
	/**
	 * Values array
	 * @var array
	 */
	var $values;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	/**
	 * Add columns to the builder
	 * @param  array $columns Array of column names
	 * @return class          Instance of the called class
	 */
	public function columns($columns)
	{
		$this->columns = $columns;
		return $this;
	}

	/**
	 * Add values to the builder
	 * @param  array $values Array of values to add to database
	 * @return class         Instance of the called class
	 */
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
	/**
	 * Compiles to the specific insert query
	 * @return string Compiled query
	 */
	public function compile()
	{
		$columns = implode(", ",$this->columns);
		$values = implode(", ",$this->values);
		$query = "INSERT INTO $this->table ($columns) VALUES ($values)";
		return $query;
	}
}
