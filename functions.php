<?php


function list_all($changing = 1) {
	include("connection.php");

		try {
			$results = $db->prepare(
				"SELECT name, address 
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

function search_by() {
	include("connection.php");
		$term = htmlspecialchars($_REQUEST['nameSearch']);
			try {
				$search = $db->prepare(
					"SELECT name, address 
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