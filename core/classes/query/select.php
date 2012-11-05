<?php

namespace Baughss\Core;

class Query_Select extends Query {
	// Misc stuff
	var $table;
	var $selector;
	var $limit = 0;
	var $order_by;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
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
	public function order_by($order)
	{
		$this->order_by = $order;
		return $this;
	}
	public function limit($amount)
	{
		$this->limit = $amount;
		return $this;
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
		if(!empty($this->order_by))
		{
			$query .= " ORDER BY ".$this->order_by;
		}
		if($this->limit > 0)
		{
			$query .= " LIMIT ".$this->limit;
		}
		return $query;
	}
}
