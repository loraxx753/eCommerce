<?php

	class Setup_Controller {


		public function action_index() {

			$queryArray = array(
					array("CREATE TABLE IF NOT EXISTS `products` (
					  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
					  `SKU` int(11) NOT NULL,
					  `Product_Name` varchar(255) NOT NULL,
					  `Product_Description` varchar(255) NOT NULL,
					  `Category_ID` int(11) NOT NULL,
					  `Stock` int(11) NOT NULL,
					  `Product_Cost` int(11) NOT NULL,
					  `Product_Price` int(11) NOT NULL,
					  `Product_Image` varchar(255) NOT NULL,
					  `Product_Weight` int(11) DEFAULT NULL,
					  `Product_Size` varchar(255) DEFAULT NULL,
					  `Featured` tinyint(1) NOT NULL,
					  `Sale_Price` int(11) DEFAULT NULL,
		  			  PRIMARY KEY (`ProductID`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;

			", "Creating Products Table."),
					array("CREATE TABLE IF NOT EXISTS `users` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `user` varchar(255) NOT NULL,
						  `pass` varchar(255) NOT NULL,
						  `email` varchar(200) NOT NULL,
						  `created` int(32) NOT NULL,
						  `updated` int(32) NOT NULL,
						  `verified` tinyint(1) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;
			", "Creating User Table."),
					array("skip", "Setup Complete.")
			);

			$result = '';

			foreach($queryArray as $query)
			{
					if($query[0] != "skip")
					{
							if(Database::query($query[0]))
							{
									$result .= "<li class='hidden'>".$query[1]."</li>";
							}
							else
							{
									$result .= '<li class="hidden">Setup has already been run</li>';
									break;
							}
					}
					else
					{
							$result .= "<li class='hidden'>".$query[1]."</li>";
					}
			}

			$render = new Render();
			$render->addVar('list', $result);
			$render->changeTemplate('blank_template');
			$render->load('setup', 'index');
		}

		public static function action_fill()
		{
			$queryArray = array(
<<<<<<< HEAD
					array("INSERT INTO `Products` (`SKU`, `Product_Name`, `Product_Description`, `Category_ID`, `Stock`, `Product_Cost`, `Product_Price`, `Product_Image`, `Product_Weight`, `Product_Size`, `Featured`, `Sale_ID`) VALUES
						(1, 'Red Thinking Chair', 'chair', 1, 5, 50, 100, 'products/chair_thumbnail.jpg', 20, '10x11x12', 0, NULL),
						(2, 'Napoleon Chair', 'chair', 1, 5, 60, 100, 'products/chair2_thumbnail.jpg', 40, '10x11x12', 1, NULL),
						(3, 'Wooden Chair', 'chair', 1, 5, 40, 100, 'products/chair3_thumbnail.jpg', 10, '10x11x12', 0, NULL),
						(4, 'Thinking Couch', 'couch', 2, 5, 80, 100, 'products/couch1_thumbnail.jpg', 50, '20x21x22', 0, NULL),
						(5, 'Chic Couch', 'couch', 2, 5, 90, 100, 'products/couch2_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(6, 'Viewing Couch', 'couch', 2, 5, 80, 100, 'products/couch3_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(7, 'Resting Couch', 'couch', 2, 5, 90, 100, 'products/couch4_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(8, 'Apple Desk', 'desk', 3, 5, 70, 100, 'products/desk_thumbnail.jpg', 40, '30x31x32', 0, NULL),
						(9, 'Writing Desk', 'desk', 3, 5, 80, 100, 'products/desk2_thumbnail.jpg', 90, '30x31x32', 0, NULL),
						(10, 'Computer Desk', 'desk', 3, 5, 60, 100, 'products/desk3_thumbnail.jpg', 40, '30x31x32', 0, NULL);
=======
					array("INSERT INTO `Products` (`SKU`, `Product_Name`, `Product_Description`, `Category_ID`, `Stock`, `Product_Cost`, `Product_Price`, `Product_Image`, `Product_Weight`, `Product_Size`, `Featured`, `Sale_Price`) VALUES
						(1, 'Red Thinking Chair', 'chair', 1, 5, 50, 100, 'img/products/chair_thumbnail.jpg', 20, '10x11x12', 0, NULL),
						(2, 'Napoleon Chair', 'chair', 1, 5, 60, 100, 'img/products/chair2_thumbnail.jpg', 40, '10x11x12', 1, NULL),
						(3, 'Wooden Chair', 'chair', 1, 5, 40, 100, 'img/products/chair3_thumbnail.jpg', 10, '10x11x12', 0, NULL),
						(4, 'Thinking Couch', 'couch', 2, 5, 80, 100, 'img/products/couch1_thumbnail.jpg', 50, '20x21x22', 0, NULL),
						(5, 'Chic Couch', 'couch', 2, 5, 90, 100, 'img/products/couch2_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(6, 'Viewing Couch', 'couch', 2, 5, 80, 100, 'img/products/couch3_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(7, 'Resting Couch', 'couch', 2, 5, 90, 100, 'img/products/couch4_thumbnail.jpg', 60, '20x21x22', 0, NULL),
						(8, 'Apple Desk', 'desk', 3, 5, 70, 100, 'img/products/desk_thumbnail.jpg', 40, '30x31x32', 0, NULL),
						(9, 'Writing Desk', 'desk', 3, 5, 80, 100, 'img/products/desk2_thumbnail.jpg', 90, '30x31x32', 0, NULL),
						(10, 'Computer Desk', 'desk', 3, 5, 60, 100, 'img/products/desk3_thumbnail.jpg', 40, '30x31x32', 0, NULL);
>>>>>>> 1859ae1ce0847cc9e31f0b1d769de1e68d6edc51
									", "Filling Products Table."),
					array("skip", "Your database has been filled.")
			);

			$result = '';

			foreach($queryArray as $query)
			{
					if($query[0] != "skip")
					{
							if(Database::query($query[0]))
							{
									$result .= "<li class='hidden'>".$query[1]."</li>";
							}
							else
							{
									$result .= '<li class="hidden">Setup has already been run</li>';
									break;
							}
					}
					else
					{
							$result .= "<li class='hidden'>".$query[1]."</li>";
					}
			}

			$render = new Render();
			$render->addVar('list', $result);
			$render->changeTemplate('blank_template');
			$render->load('setup', 'fill');
		}
	}