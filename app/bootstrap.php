<?php

// Include the autoloader because it can't really load itself.
require COREBASE."classes".DIRECTORY_SEPARATOR."autoloader.php";

// Alias the autoloader to the global namespace.
class_alias('Baughss\Core\Autoloader', 'Autoloader');

// Start the autoloader
Autoloader::start();

// Add all of the core classes to the autoloader
Autoloader::add_classes(array(
	'Baughss\Core\Auth',
	'Baughss\Core\Config',
	'Baughss\Core\Controller',
	'Baughss\Core\CurlRequest',
	'Baughss\Core\Database',
	'Baughss\Core\Encryption',
	'Baughss\Core\Error',
	'Baughss\Core\Load',
	'Baughss\Core\Model',
	'Baughss\Core\Render',
	'Baughss\Core\Review',
	'Baughss\Core\Query',
	'Baughss\Core\Query_Insert',
	'Baughss\Core\Query_Select',
	'Baughss\Core\Query_Update',
	'Baughss\Core\Session',
	'Baughss\Core\Shopper',
));

// Alias them to the global namespace.
Autoloader::alias_core_classes();
