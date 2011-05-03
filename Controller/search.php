<?php session_start();
header('Content-type: text/html; charset=utf-8');

function gridRow ($data) {
	echo "<tr><td>".utf8_encode($data['name'])."</td>";
	echo "<td>".$data['ST-ID']."</td>";
	echo "<td>".$data['beers']."</td>";
	echo "<td>".$data['drinks']."</td>";
	if($_SESSION['Admin']) 
		echo "<td>".$data['active']."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data['ST-ID']."\" checked></td>";
	echo "</tr>";
}

// $q fra autocomplete i s�ge view (ajax)
if(isset($_GET["q"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	$q = strtolower($_GET["q"]);
	$users = $UserModel->searchVolunteers($q);
	foreach ($users as $user) {
		echo $user['ST-ID'].", ".utf8_encode($user['name'])."\n";
	}
	
} // N�r der trykkes p� tilf�j knappen sendes  $_GET["id"]
elseif (isset($_GET["id"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	$id = $_GET["id"];
	$user = $UserModel->searchVolunteer($id);
	gridRow($user);
} // N�r der opdateresi gridden
elseif (isset($_GET["ids"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	$ids = substr($_GET["ids"], 3);
	foreach (explode(", ", $ids) as $id) {
		$user = $UserModel->searchVolunteer($id);
		gridRow($user);
	}
}
