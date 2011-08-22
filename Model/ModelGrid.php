<?php
include_once ("ModelBrain.php");
include_once ("ModelAbstractCardHolder.php");
include_once ("ModelVolunteer.php");
session_start();

header('Content-type: text/html; charset=utf-8');

// Returns the data to be rendered
function gridRow ($data) {

	echo "<tr><td id='name'>".$data['name']."</td>";
	echo "<td id='id'>".$data['ST-ID']."</td>";
	echo "<td id='beers'>".$data['beers']."</td>";
	echo "<td id = 'drinks'>".$data['drinks']."</td>";
	if($_SESSION['user'] == 2)
	echo "<td id = 'active'>".$data['active']."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data['ST-ID']."\"></td>";
	echo "</tr>";
}

// Parse volunteer. That is get user data for gridRow()
function parseVolunteer($volunteer) {
	$data['name'] = $volunteer->getFullName();
	$data['ST-ID'] = $volunteer->id->current;
	$data['beers'] = $volunteer->getBeers();
	$data['drinks'] = $volunteer->getDrinks();
	$data['active'] = $volunteer->active->current;
	return $data;

}

// Nothing yet.
function paginate ($data) {

}

// Show the workgroup
function workGroup() {
	$session = $_SESSION['workgroup'];
	// Get users in active session
	foreach($session as $key => $volunteer) {
		// Parse the data.
		$data = parseVolunteer($volunteer);
		// Render
		gridRow($data);
	}
}

// Show all function.
function showAll() {
	// Take care of user model!!!
	$UserModel = new User();
	// Get all users
	$users = $UserModel->searchVolunteers("", "id");

	// Loop thru users.
	foreach ($users as $user) {
		$id = $user['ST-ID'];
		// Already in session
		if (array_key_exists($id, $_SESSION['workgroup'])) {
			// Garbage data in session. Handle fail...currently nothing happens.
			if ($_SESSION['workgroup'][$id] == 'fail') {
			} else {
				// Parse the data on succes.
				$data = parseVolunteer($_SESSION['workgroup'][$id]);
			}
		} else {
			$data = $user;
		}
		// Render
		gridRow($data);
	}
}

// Set appropriate view
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
