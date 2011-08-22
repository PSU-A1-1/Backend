<?php

// Initialize brain
include_once 'ModelBrain.php';


// Set session vars
session_start();
if (!isset($_SESSION['idsAdded']))
	$_SESSION['idsAdded'] = array();

if (!isset($_SESSION['idsChanged']))
	$_SESSION['idsChanged'] = array();

if (!isset($_SESSION['workgroup']))
	$_SESSION['workgroup'] = array();

if(!isset($_SESSION['user'])) {
	$_SESSION['user'] = 0;
}

if(!isset($_SESSION['brain'])) {
	$Brain = new ModelBrain();
	$_SESSION['brain'] = $Brain;
} else {
	$Brain = $_SESSION['brain'];
}


// Interface
if(isset($_POST['m'])) {

	$succes = true;

	switch ($_POST['m']) {
		// Done for now
		

		case 'addFixed':
			foreach(explode("|", $_POST['ids']) as $id) {
				if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $Brain->createUserFromId($id);
					//var_dump($user);
				}
					
				// Make $std_ a datacall
				if ($user->updateBoth($Brain->std_beers, $Brain->std_drinks)) {
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
					$user = $Brain->createUserFromId($id);
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
				$user = $Brain->createUserFromId($id);
			}

			if ($user->updateBoth((int)$_POST['beers'], (int)$_POST['drinks'])) {
				$_SESSION['workgroup'][$id] = $user;
			} else {
				$_SESSION['workgroup'][$id] = "fail";
			}
			break;

		case 'getVolunteer':
			$arr = $Brain->getVolunteer($_POST['id']);
			echo json_encode($arr);
			break;

		case 'newVolunteer':
			$user = $Brain->createVolunteer($_POST['name'], $_POST['s_name'], $_POST['s_id'], $_POST['aktiv']);
			echo $Brain->addVolunteer($user);

			break;

		case 'updateVolunteer':
			echo $Brain->updateVolunteer($_POST['name'], $_POST['s_name'], $_POST['aktiv'], $_POST['newid'], $_POST['oldid']);
			break;

		case 'activate':
			foreach(explode("|", $_POST['ids']) as $id) {
				if (array_key_exists($id, $_SESSION['workgroup'])) {
					$user = $_SESSION['workgroup'][$id];
				} else {
					$user = $Brain->createUserFromId($id);

				}

				if ($user->updateActive()) {
					$_SESSION['workgroup'][$id] = $user;
				} else {
					$_SESSION['workgroup'][$id] = "fail";
				}
					
			}

			break;
				
		case 'newId':
			echo $Brain->getNewId();
				
			break;


	}
	if(!$succes)
	echo "Error";
}