<?php
class User {
	public $std_beers = 6;
	public $std_drinks = 4;
	
	function User() {	
		include_once '../connect.php';
		
	}
	function searchVolunteer($id) {
		$volunteer_query = mysql_query("SELECT `ST-ID`, CONCAT_WS(' ',first_name, surname) AS name, beers, drinks, active, start_date FROM volunteer WHERE `ST-ID` = '$id' LIMIT 1") or die(print(mysql_error()));
		$volunteer = mysql_fetch_assoc($volunteer_query);
		return $volunteer;
	}
	function searchVolunteers($text) {
		$query = "SELECT `ST-ID`, CONCAT_WS(' ',first_name, surname) AS name FROM volunteer WHERE CONCAT(first_name, surname) LIKE '%$text%'";
		$volunteer_query = mysql_query($query);
		$volunteers = array();
		$i = 0;
		while($volunteer = mysql_fetch_assoc($volunteer_query)) {
			$volunteers[$i]['ST-ID'] = $volunteer['ST-ID'];
			$volunteers[$i]['name'] = $volunteer['name'];
			$i++;
		}
		mysql_close();
		return $volunteers;
	}
	function addPoints($id, $beers, $drinks) {
		$query = "UPDATE volunteer SET beers = beers + $beers,
				  drinks = drinks + $drinks WHERE `ST-ID` = $id";
		$result = mysql_query($query);
		if ($result)
			return $id;
		else
			return mysql_error();
	}
}
?>