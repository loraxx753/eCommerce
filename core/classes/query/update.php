<?php

namespace Baughss\Core;

class Query_Update extends Query {
	// Misc stuff
	var $table;
	var $set = array();
	var $query;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	public function prepare()
	{
		$query = $this->compile();
		$this->query = $query;		
	}
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
	public function execute() 
	{
		$this->prepare();
		$items =  \Database::query($this->query);
		$items->setFetchMode(\PDO::FETCH_CLASS, 'Model_'.ucwords($this->table));
		while($obj = $items->fetch()) {
			$return[] = $obj;
		}
		if(isset($return))
		{
			return $return;
		}
		else
		{
			return false;
		}
	}
}
