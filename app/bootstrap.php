<?php
	
require COREBASE."classes".DIRECTORY_SEPARATOR."autoloader.php";

class_alias('Baughss\Core\Autoloader', 'Autoloader');

Autoloader::start();

Autoloader::add_classes(array(
	'Baughss\Core\Config',
	'Baughss\Core\Controller',
	'Baughss\Core\CurlRequest',
	'Baughss\Core\Database',
	'Baughss\Core\Encryption',
	'Baughss\Core\Error',
	'Baughss\Core\Load',
	'Baughss\Core\Login',
	'Baughss\Core\Render',
	'Baughss\Core\Template',
));

Autoloader::alias_core_classes();
