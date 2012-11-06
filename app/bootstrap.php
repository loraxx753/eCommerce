<?php
	
require COREBASE."classes".DIRECTORY_SEPARATOR."autoloader.php";

class_alias('Baughss\Core\Autoloader', 'Autoloader');

Autoloader::start();

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

Autoloader::alias_core_classes();
