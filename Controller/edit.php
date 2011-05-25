<?php
include_once ("../Model/user_model.php");
include_once '../Model/cardholder.php';
include_once '../Model/volunteer.php';
session_start();

// Debug
ini_set('display_errors',1);
error_reporting(E_ALL);

if(isset($_POST['m'])) {

	$UserModel = new User();
	$succes = true;

	switch ($_POST['m']) {
		// Done for now
		case 'addFixed':
			foreach(explode("|", $_POST['ids']) as $id) {
				if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $UserModel->createUserFromId($id);
					//var_dump($user);
				}
					
				// Make $std_ a datacall
				if ($user->updateBoth($UserModel->std_beers, $UserModel->std_drinks)) {
					$_SESSION['workgroup'][$id] = $user;
				} else {
					$_SESSION['workgroup'][$id] = "fail";
				}
					

				// if user->succes!!!
					
			}
			break;

		case 'addSpecial':
			foreach(explode("|", $_POST['ids']) as $id) {
				if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $UserModel->createUserFromId($id);
				}

				if ($user->updateBoth((int)$_POST['beers'], (int)$_POST['drinks'])) {
					$_SESSION['workgroup'][$id] = $user;
				} else {
					$_SESSION['workgroup'][$id] = "fail";
				}
			}
			break;

		case 'addGuest':
			
			
			$id = $_POST['id'];
			if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $UserModel->createUserFromId($id);
				}
				
			if ($user->updateBoth((int)$_POST['beers'], (int)$_POST['drinks'])) {
					$_SESSION['workgroup'][$id] = $user;
				} else {
					$_SESSION['workgroup'][$id] = "fail";
				}
			break;

		case 'getVolunteer':
			$arr = $UserModel->getVolunteer($_POST['id']);
			echo json_encode($arr);
			break;

		case 'newVolunteer':
			$user = $UserModel->createVolunteer($_POST['name'], $_POST['s_name'], $_POST['aktiv']);
			echo $UserModel->addVolunteer($user);

			break;

		case 'updateVolunteer':
			echo $UserModel->updateVolunteer($_POST['name'], $_POST['s_name'], $_POST['aktiv'], $_POST['newid'], $_POST['oldid']);
			break;

		case 'activate':
			foreach(explode("|", $_POST['ids']) as $id) {
				if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $UserModel->createUserFromId($id);

				}

				if ($user->updateActive()) {
					$_SESSION['workgroup'][$id] = $user;
				} else {
					$_SESSION['workgroup'][$id] = "fail";
				}
					
			}

			break;


	}
	if(!$succes)
	echo "Error";
}
?>