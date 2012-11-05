<?php

namespace Baughss\Core;

class Model {
	static function build() {
		$table = self::get_table();
		return Query::select($table);
	}
	public function save()
	{
		$table = self::get_table();
		$columns = self::get_columns();
		$id = array_shift($columns);

		if($this->ProductID == NULL)
		{
			$save = new Query_Insert($table);
			$save->columns($columns);
			$values = array();
			foreach($columns as $column)
			{
				if($this->$column == NULL)
				{
					$this->$column = "NULL";
				}
				$values[] = $this->$column;
			}
			$save->values($values);
			$save->execute();
			return true;
		}
		else
		{
			$save = new Query_Update($table);
			foreach($columns as $column)
			{
				if($this->$column == NULL)
				{
					$this->$column = "NULL";
				}
				$save->set($column, $this->$column);
			}
			$save->where($id, $this->$id);
			$save->execute();
			return true;
		}
	}
	public function delete()
	{
		$table = self::get_table();
		$where_array = array();
		$query = "DELETE FROM $table WHERE ";
		$columns = self::get_columns();
		$id = array_shift($columns);
		$query .= $id." = ".$this->$id;

		try 
		{
			Database::query($query);
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	public static function get_columns()
	{
		$class = get_called_class();
		$variables = get_class_vars($class);
		return array_keys($variables);
	}
	public static function get_table()
	{
		$class = get_called_class();
		$array = explode("_", $class);
		$table = array_pop($array);
		$table = strtolower($table);
		return $table;
	}
}
