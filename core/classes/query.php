<?php

namespace Baughss\Core;
/**
 * Generic Query builder class
 */
class Query {
	/**
	 * Name of the table 
	 * @var string
	 */
	var $table;
	/**
	 * Array of "and where" cases
	 * @var array
	 */
	var $where = array();
	/**
	 * Array of "or where" cases
	 * @var array
	 */
	var $or_where = array();
	/**
	 * The query string
	 * @var string
	 */
	var $query;

	function __construct($table) 
	{
		$this->table = $table;
		$this->selector = array("*");
	}
	/**
	 * Creates a new select builder and returns it.
	 * @param  [type] $table [description]
	 * @return [type]        [description]
	 */
	public static function select($table)
	{
		return new \Query_Select($table);
	}
	/**
	 * Adds a parameter to the where clause. 
	 * 
	 * If the value is null, then "=" is assumed as the selector and $selector is used as value
	 * @param  string $column    The name of the column
	 * @param  string $seperator The seperator (or value if $value is null)
	 * @param  string $value     Default null. Only used if selector is specified.
	 * @return class             Current instance of class.
	 */
	public function where($column, $seperator, $value = null) {
		if(!$value) {
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
	/**
	 * Adds a value to the or_where variable
	 *
	 * If the value is null, then "=" is assumed as the selector and $selector is used as value
	 * @param  string $column    The name of the column
	 * @param  string $seperator The seperator (or value if $value is null)
	 * @param  string $value     Default null. Only used if selector is specified.
	 * @return class             Current instance of class.
	 */
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
	/**
	 * Runs the builders specific compile and sets that to the query variable.
	 */
	public function prepare()
	{
		$query = $this->compile();
		$this->query = $query;		
	}
	/**
	 * Default compiler.
	 * @return string Empty string
	 */
	public function compile()
	{
		$query = "";
		return $query;
	}
	/**
	 * Executes the query and returns the result as the model object
	 * @return class The called class
	 */
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