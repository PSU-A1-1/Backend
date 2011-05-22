<?php 
include_once ("../Model/user_model.php");
session_start();


function idChange ($id, $beers, $drinks) {
	if (!isset($_SESSION['idsChanged'][$id])) {
		$_SESSION['idsChanged'][$id] = "$beers, $drinks";
	} else {
		$t = explode(", ", $_SESSION['idsChanged'][$id]);
		$_SESSION['idsChanged'][$id] = ($t[0]+$beers) . ", " . ($t[1]+$drinks);
	}
}


if(isset($_POST['m'])) {

	$UserModel = new User();
	$succes = true;
	
	switch ($_POST['m']) {
		
	case 'addFixed':
		foreach(explode("|", $_POST['ids']) as $id) {
			if (array_key_exists($id, $_SESSION['workgroup'])) {		
				$user = $_SESSION['workgroup'][$id];
			} else {
				$user = $UserModel->createUserFromId($id);	
			}
			
		if ($user->updateDrinks(10)) {
				$_SESSION['workgroup'][$id] = $user;
			} else {
				$_SESSION['workgroup'][$id] = "fail";
			}
			
		
			// if user->succes!!!
			
		}
		break;
		
	case 'addSpecial':
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		foreach(explode("|", $_POST['ids']) as $id) {
			if($UserModel->addPoints($id, $_POST['beers'], $_POST['drinks']) === true) {
				if(!in_array($id, $_SESSION['idsAdded']))
					$_SESSION['idsAdded'][] = $id;
				idChange($id, $_POST['beers'], $_POST['drinks']);
			} else {
				$succes = false;
			}
			
		}
		break;
		
	case 'addGuest':
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		$id = $_POST['id'];
		if ($UserModel->addPoints($id, $_POST['beers'], $_POST['drinks']) === true) {
			if(!in_array($id, $_SESSION['idsAdded']))
					$_SESSION['idsAdded'][] = $id;
			idChange($id, $_POST['beers'], $_POST['drinks']);
		} else {
			$succes = false;
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
	foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		foreach(explode("|", $_POST['ids']) as $id) {
			if(!in_array($id, $_SESSION['idsAdded']))
					$_SESSION['idsAdded'][] = $id;
			// TODO : acChange($id, $_POST['beers'], $_POST['drinks']);
			echo $UserModel->activate($id)."<br>";
		}
		break;
		
		
		
	}
	if(!$succes) 
		echo "Error";
}
?>