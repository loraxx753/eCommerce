<?php

namespace Baughss\Core;

class Model {
	static function build() {
		$class = get_called_class();
		$table = strtolower(array_pop(explode("_", $class)));
		return new \Query($table);
	}
}
