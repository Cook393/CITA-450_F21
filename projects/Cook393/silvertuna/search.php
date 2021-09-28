<!DOCTYPE html>
<html>
    <head>
	
        <title>
			The Silver Tuna
        </title>
		
    </head>
    <body>
	
		<form action="search.php" method="get">
			<input type="text" name="searchBar" placeholder="Search.." size='50'>
			<input type ="submit">
		</form>
		
		<br>
		SEARCH BY RESTNAME
		<br>
		
		<?php	// Recives user input and queries restaurants by 'RestName'
		
				// Ensure database.php file is required
				require 'database.php';
				
				// Getting and storing value from search bar
				$userInput = $_GET["searchBar"];
				
				// Input Validation: if the search bar is not empty, and the value is not 100% numeric
				if($userInput!= "" && !is_numeric($userInput)){ 
				
					// Execute user input RestName query
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE RestName LIKE' . "'%" . $userInput . "%'");
				}
		?>
		
		<br>
		SEARCH BY ZIPCODE
		<br>
		
		<?php	// Recives user input and queries restaurants by 'ZipCode'
		
				// Getting and storing value from search bar
				$userInput = $_GET["searchBar"];
				
				// Input Validation: if search bar is not empty, and the input is 100% numeric, and the input has 5 numbers: execute query
				if($userInput!= "" && is_numeric($userInput) && strlen($userInput) == 5){
					
					// Execute user input ZipCode query
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE ZipCode LIKE' . "'" . $userInput . "'");
				}
		?>
		
		<br>
		SEARCH BY CATEGORY
		<br>
		
		<?php	// Recives user input and queries restaurants by 'CategoryID'
		
				// Getting and storing value from search bar
				$userInput = $_GET["searchBar"];
				
				// Input Validation: if search bar is not empty, and the input is 100% numeric, and the input has 5 numbers: execute query
				switch(strtolower($userInput)){
					
					case "seafood":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 1');
					break;
					
					case "indian":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 2');
					break;
					
					case "desserts":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 3');
					break;
					
					case "diner":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 4');
					break;
					
					case "chinese":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 5');
					break;
					
					case "bar":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 6');
					break;
					
					case "mexican":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 7');
					break;
					
					case "italian":
					$results = executeRestaurantQuery('SELECT * FROM restaurant WHERE CategoryID LIKE 8');
					break;
				}
		?>
		
    </body>
</html>