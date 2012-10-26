<?php

namespace Baughss\Core;

class Model {
	static function build() {
		$class = get_called_class();
		$array = explode("_", $class);
		$table = array_pop($array);
		$table = strtolower($table);
		return new \Query($table);
	}
}
