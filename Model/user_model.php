<?php

// Debug
ini_set('display_errors',1); 
error_reporting(E_ALL); 
//include_once 'cardholder.php';
//include_once 'volunteer.php';

class User {
	public $std_beers;
	public $std_drinks;

	public function __construct() {
		include_once 'connect.php';
		$this->std_beers = 6;
		$this->std_drinks = 4;

	}
	public function searchVolunteer($id) {
		$volunteer_query = mysql_query("SELECT `ST-ID`, CONCAT_WS(' ',first_name, surname) AS name, beers, drinks, active, start_date 
                                                FROM volunteer WHERE `ST-ID` = '$id' LIMIT 1") or die(print(mysql_error()));
		$volunteer = mysql_fetch_assoc($volunteer_query);
		return $volunteer;
	}
	public function searchVolunteers($text) {
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
	
//------------------------------------------------------------
	
	public function addVolunteer($user) {
		
		$name = $user->name->original;
		$surname = $user->surname->original;
		$id = $user->id->current;
		$active = $user->active->original;
		
		$query = "INSERT INTO volunteer (`ST-ID`, `first_name`, `surname`, `beers`, `drinks`, `active`, `start_date`)
			      VALUES ($id, '$name', '$surname', 0, 0, '$active', CURDATE())";

		$result = mysql_query($query);
		if ($result) {
			$_SESSION['workgroup'][(string)$id] = $user;
			return "Ny frivillig: ".$name." ".$surname." with id: ".$id;
		}
		else {
			return mysql_error();
		}	
	}
	
	public function createUserFromId($id) {
		$query = "SELECT `ST-ID` AS id , `first_name` AS name , `surname` , `beers`, `drinks`, `active`
				  FROM volunteer
				  WHERE `ST-ID` = $id LIMIT 1 ";
		$result = mysql_query($query) or die(print(mysql_error()));
		if ($result) {
			$data = mysql_fetch_assoc($result);
			$volunteer = new Volunteer($data['name'], $data['surname'], $data['id'], $data['beers'], $data['drinks'], $data['active']);
			return $volunteer;
		} else {
			return mysql_error();
		}
	}
	
	public function createVolunteer($name, $surname, $active) {
		// Make safer		
		$id = mysql_result(mysql_query("SELECT 1 + COALESCE((SELECT MAX(`ST-ID`)
					        	        FROM volunteer), 0)"), 0);
		
		if ($id) {
			$user = new Volunteer($name, $surname, $id, 0, 0, $active);
			return $user;
		
		} else {
			//
		}
		
		

	}


	// Same as seach, but search concats names...
	public function getVolunteer($id) {
		$volunteer_query = mysql_query("SELECT `ST-ID` AS id , `first_name` , `surname` , `active`
					        FROM volunteer
						WHERE `ST-ID` = $id LIMIT 1  ") or die(print(mysql_error()));
		$volunteer = mysql_fetch_assoc($volunteer_query);
		return $volunteer;
	}

	public function getNewId() {
		$id = 0;
		$result = mysql_query("SELECT 1 + COALESCE((SELECT MAX(`ST-ID`)
				       FROM volunteer), 0)");
		if ($result) {
			$id = mysql_result($result, 0);
		}

		return $id;

	}

	public function updateVolunteer($name, $s_name, $active, $newId, $oldId) {
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