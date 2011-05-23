<?php
include_once ("../Model/user_model.php");
session_start();

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
	$data['name'] = $volunteer->name->original;
	$data['ST-ID'] = $volunteer->id->current;
	$data['beers'] = $volunteer->beers->original;
	$data['drinks'] = $volunteer->drinks->original;
	$data['active'] = $volunteer->active->original;
	return $data;
	
}

function workGroup() {
	foreach($_SESSION['workgroup'] as $key => $volunteer) {	
		$data = parseVolunteer($volunteer);
		gridRow($data);
	}	
}

function showAll() {
	// Take care of user model!!!
	$UserModel = new User();
	$users = $UserModel->searchVolunteers("");
	
	foreach ($users as $user) {
		$id = $user['ST-ID'];
	if (array_key_exists($id, $_SESSION['workgroup'])) {		
				$data = parseVolunteer($_SESSION['workgroup'][$id]);
			} else {
				$data = $user;	
			}
		
		gridRow($data);
	}
}

if(isset($_GET["workgroup"])) {
	workGroup();	
}
if(isset($_GET["showall"])) {
	showAll();	
}

?>