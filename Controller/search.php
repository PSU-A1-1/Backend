<?php session_start();
header('Content-type: text/html; charset=utf-8');

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
	echo "<tr><td>".utf8_encode($data['name'])."</td>";
	echo "<td>".$data['ST-ID']."</td>";
	echo "<td>".$data['beers'].$pointChange[0]."</td>";
	echo "<td>".$data['drinks'].$pointChange[1]."</td>";
	if($_SESSION['Admin']) 
		echo "<td>".$data['active']."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data['ST-ID']."\"></td>";
	echo "</tr>";
}

// $q fra autocomplete i søge view (ajax)
if(isset($_GET["q"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	$q = strtolower($_GET["q"]);
	$users = $UserModel->searchVolunteers($q);
	foreach ($users as $user) {
		echo $user['ST-ID'].", ".utf8_encode($user['name'])."\n";
	}	
} // Når der trykkes på tilføj knappen sendes  $_GET["id"]
elseif (isset($_GET["id"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	$id = $_GET["id"];
	if (!in_array($id, $_SESSION['idsAdded'])) {
		$_SESSION['idsAdded'][] = $id;
	}
	$user = $UserModel->searchVolunteer($id);
	gridRow($user);
} // Når der opdateresi gridden
elseif (isset($_GET["ids"])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	//$ids = substr($_GET["ids"], 3);
	foreach ($_SESSION['idsAdded'] as $id) {
		$user = $UserModel->searchVolunteer($id);
		gridRow($user);
	}
} elseif (isset($_GET["showall"]) && $_GET["showall"] == 1) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
	$users = $UserModel->searchVolunteers("");
	foreach ($users as $user) {
		gridRow($user);
	}
}
