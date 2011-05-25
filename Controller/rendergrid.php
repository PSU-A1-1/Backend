<?php
include_once ("../Model/user_model.php");
include_once ("../Model/cardholder.php");
include_once ("../Model/volunteer.php");
session_start();
header('Content-type: text/html; charset=utf-8');


function gridRow ($data) {

	echo "<tr><td id='name'>".utf8_encode($data['name'])."</td>";
	echo "<td id='id'>".$data['ST-ID']."</td>";
	echo "<td id='beers'>".$data['beers']."</td>";
	echo "<td id = 'drinks'>".$data['drinks']."</td>";
	if($_SESSION['Admin'])
	echo "<td id = 'active'>".$data['active']."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data['ST-ID']."\"></td>";
	echo "</tr>";
}

function parseVolunteer($volunteer) {
	$data['name'] = $volunteer->getFullName();
	$data['ST-ID'] = $volunteer->id->current;
	$data['beers'] = $volunteer->getBeers();
	$data['drinks'] = $volunteer->getDrinks();
	$data['active'] = $volunteer->active->current;
	return $data;

}

function workGroup() {
	$session = $_SESSION['workgroup'];
	//ksort($session);
	foreach($session as $key => $volunteer) {
		$data = parseVolunteer($volunteer);
		gridRow($data);
	}
}

function showAll() {
	// Take care of user model!!!
	$UserModel = new User();
	$users = $UserModel->searchVolunteers("", "id");

	foreach ($users as $user) {
		$id = $user['ST-ID'];
		if (array_key_exists($id, $_SESSION['workgroup'])) {
			// Handle fail...
			if ($_SESSION['workgroup'][$id] == 'fail') {
			} else {
				$data = parseVolunteer($_SESSION['workgroup'][$id]);
			}
		} else {
			$data = $user;
		}
		gridRow($data);
	}
}


if(isset($_GET["view"])) {
	switch ($_GET["view"]) {
		case "workgroup" : workGroup();
		break;
		case "showall" : showAll();
		break;
		default : showAll();
		break;
	}
}




?>

