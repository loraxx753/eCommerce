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
					  `Total_Sold` int(11) NOT NULL,
		  			  PRIMARY KEY (`ProductID`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;

			", "Creating Products Table."),
					array("CREATE TABLE IF NOT EXISTS `updates` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `current` int(11) NOT NULL DEFAULT '0',
						  PRIMARY KEY (`id`)
						) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
			", "Creating Updater Table"),
					array("CREATE TABLE IF NOT EXISTS `users` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `user` varchar(255) NOT NULL,
						  `pass` varchar(255) NOT NULL,
						  `email` varchar(200) NOT NULL,
						  `created` int(32) NOT NULL,
						  `updated` int(32) NOT NULL,
						  `access` int(3) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1;
			", "Creating User Table."),
					array("INSERT INTO `Products` (`SKU`, `Product_Name`, `Product_Description`, `Category_ID`, `Stock`, `Product_Cost`, `Product_Price`, `Product_Image`, `Product_Weight`, `Product_Size`, `Featured`, `Sale_Price`, `Total_Sold`) VALUES
						(1, 'Thinking Chair', 'chair', 1, 5, 50, 100, 'products/chair', 20, '10x11x12', 0, NULL, 0),
						(2, 'Napoleon Chair', 'chair', 1, 5, 60, 100, 'products/chair2', 40, '10x11x12', 1, NULL, 0),
						(3, 'Wooden Chair', 'chair', 1, 5, 40, 100, 'products/chair3', 10, '10x11x12', 0, NULL, 0),
						(4, 'Thinking Couch', 'couch', 2, 5, 80, 100, 'products/couch1', 50, '20x21x22', 0, NULL, 0),
						(5, 'Chic Couch', 'couch', 2, 5, 90, 100, 'products/couch2', 60, '20x21x22', 1, NULL, 9),
						(6, 'Viewing Couch', 'couch', 2, 5, 80, 100, 'products/couch3', 60, '20x21x22', 0, NULL, 8),
						(7, 'Resting Couch', 'couch', 2, 5, 90, 100, 'products/couch4', 60, '20x21x22', 1, NULL, 7),
						(8, 'Apple Desk', 'desk', 3, 5, 70, 100, 'products/desk', 40, '30x31x32', 0, NULL, 4),
						(9, 'Writing Desk', 'desk', 3, 5, 80, 100, 'products/desk2', 90, '30x31x32', 1, NULL, 2),
						(10, 'Computer Desk', 'desk', 3, 5, 60, 100, 'products/desk3', 40, '30x31x32', 0, NULL, 1);

									", "Filling Products Table."),
					array("INSERT INTO `updates` (`id`, `current`) VALUES (1, 0);", "Filling Updater."),
					array("skip", "Setup Complete.")
			);
			Auth::register('Super', "UPPER~CASE", "UPPER~CASE", "super@example.com", 2);
			Auth::register('Admin', "high^five", "high^five", "admin@example.com", 3);

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

		public static function action_update()
		{

			$currentUpdate = \Database::query("SELECT * FROM updates LIMIT 1")->fetch();

			$queryArray = array(
					array("CREATE TABLE  `ecommerce`.`reviews` (
							`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
							`product_id` INT NOT NULL ,
							`review` TEXT NOT NULL ,
							`rating` INT NOT NULL DEFAULT  '0',
							`created` INT( 33 ) NOT NULL
							) ENGINE = MYISAM ;
					", "Creating Reviews Table"),
					array("ALTER TABLE  `reviews` ADD  `user` VARCHAR( 255 ) NOT NULL AFTER  `rating`
						", "Adding user to review table"),
					array("CREATE TABLE IF NOT EXISTS `catagories` (
						  `catagoryID` int(11) NOT NULL AUTO_INCREMENT,
						  `name` varchar(255) NOT NULL, 
						  `parentID` int(11) NOT NULL DEFAULT '0',
						   PRIMARY KEY (`catagoryID`)
						   ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
							", "Creating Catagories Table."),
					array("INSERT INTO `catagories` (`name`, `parentID`) VALUES 
						('Chairs', 0),
						('Couches', 0),
						('Desks', 0);", "Filling Catagories."),
				);
			if($currentUpdate['current'] > 0)
			{
				$undoneUpdates = array_slice($queryArray, $currentUpdate['current']);
			}
			else
			{
				$undoneUpdates = $queryArray;
			}

			$result = '';
			foreach($undoneUpdates as $query)
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
					$currentUpdate['current']++;
			}

			\Database::query("UPDATE updates SET current=$currentUpdate[current] WHERE id=$currentUpdate[id]");

			$render = new Render();
			$render->addVar('list', $result);
			$render->changeTemplate('blank_template');
			$render->load('setup', 'update');
		}
	}