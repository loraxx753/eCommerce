<?php

namespace Baughss\Core;
/**
 * Controller class to handle loading views
 */
class Controller {
	/**
	 * Loads view to the page
	 * @param  string $type Folder name
	 * @param  string $page Page in that folder
	 * @return void
	 */
	public static function render($type, $page)
	{
		$page_location = BASE.'views/'.$type.'/'.$page.'.php';
		require_once(BASE.'/views/template.php');
	}
}