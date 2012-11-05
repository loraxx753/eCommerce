<?php

namespace Baughss\Core;

class Query {
	var $table;
	var $where = array();
	var $or_where = array();
	var $query;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	public static function select($table)
	{
		return new \Query_Select($table);
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
	public function prepare()
	{
		$query = $this->compile();
		$this->query = $query;		
	}
	public function compile()
	{
		$query = "";
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