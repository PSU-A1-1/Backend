<?php
class User {
	public $std_beers = 6;
	public $std_drinks = 4;

	function User() {
		include_once '../connect.php';

	}
	function searchVolunteer($id) {
		$volunteer_query = mysql_query("SELECT `ST-ID`, CONCAT_WS(' ',first_name, surname) AS name, beers, drinks, active, start_date 
                                                FROM volunteer WHERE `ST-ID` = '$id' LIMIT 1") or die(print(mysql_error()));
		$volunteer = mysql_fetch_assoc($volunteer_query);
		return $volunteer;
	}
	function searchVolunteers($text) {
		$query = "SELECT `ST-ID`, CONCAT_WS(' ',first_name, surname) AS name, beers, drinks, active 
                          FROM volunteer WHERE CONCAT(first_name, surname) LIKE '$text%'";
		$volunteer_query = mysql_query($query);
		$volunteers = array();
		$i = 0;
		while($volunteer = mysql_fetch_assoc($volunteer_query)) {
			$volunteers[$i]['ST-ID'] = $volunteer['ST-ID'];
			$volunteers[$i]['name'] = $volunteer['name'];
			$volunteers[$i]['beers'] = $volunteer['beers'];
			$volunteers[$i]['drinks'] = $volunteer['drinks'];
			$volunteers[$i]['active'] = $volunteer['active'];
			$i++;
		}
		mysql_close();
		return $volunteers;
	}

	function addPoints($id, $beers, $drinks) {
		$query = "UPDATE volunteer 
                          SET beers = beers + $beers, drinks = drinks + $drinks 
                          WHERE `ST-ID` = $id";
		$result = mysql_query($query);

		if (mysql_affected_rows() == 0)
		return "Ikke fundet";
		elseif ($result)
		return true;
		else
		return mysql_error();
	}

	// Transaction with rollback?
	function addVolunteer($name, $s_name, $active) {
		$id = mysql_result(mysql_query("SELECT 1 + COALESCE((SELECT MAX(`ST-ID`)
					        FROM volunteer), 0)"), 0);
		// Why not?
		//$id = this.getNewId();


		$query = "INSERT INTO volunteer (`ST-ID`, `first_name`, `surname`, `beers`, `drinks`, `active`, `start_date`)
			  VALUES ($id, '$name', '$s_name', 0, 0, $active, CURDATE())";

		$result = mysql_query($query);
		if ($result) {
			return "Ny frivillig: ".$name." ".$s_name." with id: ".$id;
		}
		else {
			return mysql_error();
		}
			
	}

	function activate($id) {
		$active = mysql_query("SELECT `active` 
                                       FROM `volunteer` 
                                       WHERE `ST-ID` = '$id'");
		if ($active) {
			if (mysql_result($active, 0) == 1) {
				$a = 0;
			} else {
				$a = 1;
			}
			$query = "UPDATE volunteer 
                                  SET active = $a 
                                  WHERE `ST-ID` = '$id'";
				
			$result = mysql_query($query);
			if ($result) {
				return $id;
			} else {
				return mysql_error();

			}

		} else {
			return mysql_error();
		}
	}

	// Same as seach, but search concats names...
	function getVolunteer($id) {
		$volunteer_query = mysql_query("SELECT `ST-ID` AS id , `first_name` , `surname` , `active`
					        FROM volunteer
						WHERE `ST-ID` = $id LIMIT 1  ") or die(print(mysql_error()));
		$volunteer = mysql_fetch_assoc($volunteer_query);
		return $volunteer;
	}

	function getNewId() {
		$id = 0;
		$result = mysql_query("SELECT 1 + COALESCE((SELECT MAX(`ST-ID`)
				       FROM volunteer), 0)");
		if ($result) {
			$id = mysql_result($result, 0);
		}

		return $id;

	}

	function updateVolunteer($name, $s_name, $active, $newId, $oldId) {
		$query = "UPDATE volunteer 
                          SET `first_name` = '$name', `surname` = '$s_name', `active` = $active, `ST-ID` = $newId  
                          WHERE `ST-ID` = $oldId";
		$result = mysql_query($query);

		if (mysql_affected_rows() == 0) {
			return "Noting changed";
		} elseif ($result) {
			return "Frivillig opdateret";
		} else {
			return mysql_error();
		}

	}

}
?>