<?php

class Home_Controller extends Controller
{
	public static function action_index()
	{
		$render = new Render();
		$render->addVar('title', "Home");
		$render->addVar('featured', Model_Products::find("Featured=1"));
		Database::query("CREATE TABLE `Products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(255) NOT NULL,
  `SKU` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Cost` float NOT NULL,
  `Price` float NOT NULL,
  `Product_Image` varchar(255) NOT NULL,
  `Featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

		$render->load('home', 'index');
	}
}