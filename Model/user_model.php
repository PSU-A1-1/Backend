<?php

// Debug
ini_set('display_errors',1); 
error_reporting(E_ALL); 


class CardHolder {

  public $id;
  public $beers;
  public $drinks;
  public $succes;
  public $error;

  public function __construct($id, $beers, $drinks) {
  	include_once '../connect.php';
    $this->id->current = (int)$id;
    $this->id->original = (int)$id;
    $this->beers->added = 0;
    $this->beers->original = (int)$beers;
    $this->drinks->added = 0;
    $this->drinks->original = (int)$drinks;
  }

  public function updateDrinks($drinks) {
    
  	$id = $this->id->current;
  	
    $query = "UPDATE volunteer 
              SET drinks = drinks + $drinks
              WHERE `ST-ID` = $id";
    $result = mysql_query($query);
   
    if (mysql_affected_rows() == 0) {
      $this->succes = false;
      $this->error = "some error";
    }
    else if ($result) {
      $this->succes = true;
      $this->drinks->added += $drinks;
    }
    else {
      $this->succes = false;
      $this->error = mysql_error();
    }   
   
    return $this->succes;
  }

    
  public function updateBeers($beers) {
    $this->beers->beers = $beers;

  }

  public function updateBoth($beers, $drinks) {
    $this->updateBeers($beers);
    $this->updateDrinks($drinks);
  }

  public function updateId($id) {
    $this->id->current = $id;
  }
    
}

class Volunteer extends CardHolder{

  public $name;
  public $surname;
  public $active;

  public function __construct($name, $surname, $id, $beers, $drinks, $active) {
    parent::__construct($id, $beers, $drinks);
    $this->name->original = $name;
    $this->surname->original = $surname;
    $this->active->original = (int)$active;
  }

  public function updateName($name) {
    $this->name->current = $name;
  }

  public function updateSurName($surName) {
    $this->surname->current = $surName;
  }

  public function updateBothNames($name, $surname) {
    $this->updateName($name);
    $this->updateSurName($surname);
  }

  public function updateActive() {
  	if ($this->active->current == 0) {
  		$this->active->current = 1;
  		
  	} else {
  		$this->active->current = 0;
  	}
  	// Make like update drinks
  	return true;
    
  }
  
}

class Guest extends CardHolder {
  public function __construct($id, $beers, $drinks) {
    parent::__construct($id, $beers, $drinks);
  }

}


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
	
	
	function addVolunteer($user) {
		
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
	
	function createUserFromId($id) {
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
	
	function createVolunteer($name, $surname, $active) {
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