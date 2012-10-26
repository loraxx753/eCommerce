<?php

namespace Baughss\Core;

class Query {
	var $table;
	var $where = array();
	var $or_where = array();
	var $selector;
	var $limit = 0;
	var $query;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	public function where($column, $seperator, $value = null) {
		if(!preg_match("/\=/", $seperator)) {
			$value = $seperator;
			$seperator = "=";
		}
		if(is_string($value))
		{
			$value = '"'.$value.'"';
		}
		$this->where[] = $column." ".$seperator." ".$value;

		return $this;	
	}
	public function or_where($column, $seperator, $value = null) {
		if(!preg_match("/\=/", $seperator)) {
			$value = $seperator;
			$seperator = "=";
		}
		if(is_string($value))
		{
			$value = '"'.$value.'"';
		}
		$this->or_where[] = $column." ".$seperator." ".$value;

		return $this;	
	}
	public function selector($selector)
	{
		if(is_string($selector))
		{
			$this->selector = array($selector);
		}
		else
		{
			$this->selector = $selector;			
		}
		return $this;
	}
	public function limit($amount)
	{
		$this->limit = $amount;
		return $this;
	}
	public function prepare()
	{
		$query = $this->compile();
		$this->query = $query;		
	}
	public function compile()
	{
		$selector = implode(", ", $this->selector);
		$query = "SELECT $selector FROM $this->table";
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
		if($this->limit > 0)
		{
			$query .= " LIMIT ".$this->limit;
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