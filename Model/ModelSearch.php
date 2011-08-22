<?php
include_once ("ModelBrain.php");
include_once ("ModelAbstractCardHolder.php");
include_once ("ModelVolunteer.php");
session_start();

$UserModel = new User();

function idChangeView ($id) {
	$out[0] = "";
	$out[1] = "";
	if (isset($_SESSION['idsChanged'][$id])) {
		$t = explode(", ", $_SESSION['idsChanged'][$id]);
		if ($t[0] > 0)
		$out[0] = " (+ $t[0])";
		elseif ($t[0] < 0)
		$out[0] = " (- $t[0])";
			
		if ($t[1] > 0)
		$out[1] = " (+ $t[1])";
		elseif ($t[1] < 0)
		$out[1] = " (- $t[1])";
	}
	return $out;
}

function gridRow ($data) {

	$pointChange = idChangeView($data['ST-ID']);

	echo "<tr><td id='name'>".$data['name']."</td>";
	echo "<td id='id'>".$data['ST-ID']."</td>";
	echo "<td id='beers'>".$data['beers'].$pointChange[0]."</td>";
	echo "<td id = 'drinks'>".$data['drinks'].$pointChange[1]."</td>";
	if($_SESSION['Admin'])
	echo "<td id = 'active'>".$data['active']."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data['ST-ID']."\"></td>";
	echo "</tr>";
}

// $q fra autocomplete i s�ge view (ajax)
if(isset($_GET["q"])) {

	$q = strtolower($_GET["q"]);
	$users = $UserModel->searchVolunteers($q);
	foreach ($users as $user) {
		echo $user['ST-ID'].", ".utf8_encode($user['name'])."\n";
	}
} // N�r der trykkes p� tilf�j knappen sendes  $_GET["id"]
elseif (isset($_GET["id"])) {

	$id = $_GET["id"];

	if (!array_key_exists($id, $_SESSION['workgroup'])) {
		$user = $UserModel->createUserFromId($id);
		$_SESSION['workgroup'][$id] = $user;
	} else {
		//
	}

}

// Remove???
// Når der opdateresi gridden
elseif (isset($_GET["ids"])) {

	foreach ($_SESSION['idsAdded'] as $id) {
		$user = $UserModel->searchVolunteer($id);
		gridRow($user);
	}
} elseif (isset($_GET["showall"]) && $_GET["showall"] == 1) {

	foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
	$users = $UserModel->searchVolunteers("");
	foreach ($users as $user) {
		gridRow($user);
	}
}


