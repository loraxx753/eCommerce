<?php

namespace Baughss\Core;

/**
 * Select builder for Query class
 */
class Query_Select extends Query {
	/**
	 * single selector or an array of selectors
	 * @var array
	 */
	var $selector;
	/**
	 * The limit of items returned
	 * @var integer
	 */
	var $limit = 0;
	/**
	 * Order by parameters for sql call
	 * @var string
	 */
	var $order_by;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	/**
	 * Builds the selector variable
	 * @param  mixed $selector An array of selectors to use or single selector string
	 * @return class           Current instance of called class.
	 */
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
	/**
	 * Builds the ordering variable
	 * @param  mixed $order A string to order the results
	 * @return class        Current instance of called class.
	 */
	public function order_by($order)
	{
		$this->order_by = $order;
		return $this;
	}
	/**
	 * Builds the limiting variable
	 * @param  int $order Amount of items to return.
	 * @return class      Current instance of called class.
	 */
	public function limit($amount)
	{
		$this->limit = $amount;
		return $this;
	}
	/**
	 * Compiles the specific select query
	 * @return string  The query.
	 */
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
