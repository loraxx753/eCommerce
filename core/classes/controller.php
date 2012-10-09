<?php
class Controller {
	public static function render($type, $page)
	{
		$page_location = BASE.'views/'.$type.'/'.$page.'.php';
		require_once(BASE.'/views/template.php');
	}
}