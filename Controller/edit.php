<?php 
include_once ("../Model/user_model.php");
session_start();

// Maybe all this should be rafactored a bit?

function idChange ($id, $beers, $drinks) {
	if (!isset($_SESSION['idsChanged'][$id])) {
		$_SESSION['idsChanged'][$id] = "$beers, $drinks";
	} else {
		$t = explode(", ", $_SESSION['idsChanged'][$id]);
		$_SESSION['idsChanged'][$id] = ($t[0]+$beers) . ", " . ($t[1]+$drinks);
	}
}

/*
function acChange ($id, $status) {
	if (!isset($_SESSION['acChanged'][$id])) {
		$_SESSION['acChanged'][$id] = "$status";
	} else {
		$t = explode(", ", $_SESSION['acChanged'][$id]);
		$_SESSION['acChanged'][$id] = "$status";
	}
}
*/

if(isset($_POST['m'])) {
	//include_once "../Model/user_model.php";
	$UserModel = new User();
	$succes = true;
	
	switch ($_POST['m']) {
		
	case 'addFixed':
		foreach(explode("|", $_POST['ids']) as $id) {
			
			$user = $UserModel->createUserFromId($id);
			//echo $user->name;
			
			if ($user->updateDrinks(10)) {
				$_SESSION['workgroup'][$id] = $user;
			} else {
				$_SESSION['workgroup'][$id] = "fail";
			}
		}
		
		/*
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		foreach(explode("|", $_POST['ids']) as $id) {
			if($UserModel->addPoints($id, $UserModel->std_beers, $UserModel->std_drinks) === true) {
				if (!in_array($id, $_SESSION['idsAdded'])) {
					$_SESSION['idsAdded'][] = $id;
				}	
				idChange($id, $UserModel->std_beers, $UserModel->std_drinks);
			} else {
				$succes = false;
			}
		}
		*/
		
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
		$id = mysql_result(mysql_query("SELECT 1 + COALESCE((SELECT MAX(`ST-ID`)
					        	        FROM volunteer), 0)"), 0);
		
		$user = new Volunteer($_POST['name'], $_POST['s_name'], $id, 0, 0, $_POST['aktiv']);
		
		echo $UserModel->addVolunteer($user);
		//var_dump($user);
		//echo $UserModel->addVolunteer($_POST['name'], $_POST['s_name'], $_POST['aktiv']);
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