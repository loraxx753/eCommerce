<?php

namespace Baughss\Core;
/**
 * Update builder for the Query class
 */
class Query_Update extends Query {
	/**
	 * Array of items to update
	 * @var array
	 */
	var $set = array();

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	/**
	 * [set description]
	 * @param string $key   Column name to be updated
	 * @param string $value Value to update column to
	 * @return  class       Instance of called class.
	 */
	public function set($key, $value)
	{
		if(is_string($value) && $value != "NULL")
		{
			$value = '"'.$value.'"';
		}
		else if($value == NULL)
		{
			$value = "NULL";
		}
		$this->set[] = $key." = ".$value;
		return $this;
	}
	/**
	 * Compiling specific for update builder
	 * @return string Query to be run
	 */
	public function compile()
	{
		$selector = implode(", ", $this->selector);
		$query = "UPDATE $this->table SET ";
		$query .= implode(", ", $this->set);


		if(count($this->where) > 0 || count($this->or_where) > 0)
		{
			$where = implode(" AND ", $this->where);
			if(count($this->where) > 0 && count($this->or_where) > 0)
			{
				$where .= " OR ";
			}
			$where .= implode(" OR ", $this->or_where);				
			$query .= " WHERE ".$where;
		}
		if(!empty($this->order_by))
		{
			$query .= " ORDER BY ".$this->order_by;
		}
		return $query;
	}
}
