<?php
function list_all($db, $changing = 1) {
		try {
			$results = $db->prepare(
				"SELECT name, address, changing_table 
				 FROM restaurant
				 WHERE changing_table = :change
				 ORDER BY name"
				 );
			$results->bindParam(':change', $changing);
			$results->execute();
		} catch (Exception $e) {
            echo "Unable to retrieve results";
            var_dump($e);
            exit;
        }
        $catalog = $results->fetchAll();
        return $catalog;    
}

function search_by($db) {
		$term = htmlspecialchars($_REQUEST['nameSearch']);
			try {
				$search = $db->prepare(
					"SELECT name, address, changing_table 
					FROM restaurant
					WHERE name
					LIKE ?
					ORDER BY name"
					);
				$search->bindValue(1, "%".$term."%", PDO::PARAM_STR);
				$search->execute();
			} catch (Exception $e) {
		            echo "Unable to retrieve results";
		            var_dump($e);
		            exit;
		    }
		    $txtSearch = $search->fetchAll();
		    return $txtSearch;
}

function add_new($db, $name, $address, $changing_table) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    	try {
	    		$add = $db->prepare(
	    			"INSERT INTO `restaurant` 
	    			(`name`, `address`, `changing_table`) 
	    			VALUES (:name, :address, :changing_table)"
	    			);
	    		$add->bindParam(':name', $name);
	    		$add->bindParam(':address', $address);
	    		$add->bindParam(':changing_table', $changing_table, PDO::PARAM_INT);
				$add->execute();
	    	} catch (Exception $e) {
		            echo "Unable to add to database";
		            var_dump($e);
		            exit;
		 	}
	}
}
