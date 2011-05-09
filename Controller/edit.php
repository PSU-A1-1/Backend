<?php session_start();
if(isset($_POST['m'])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	switch ($_POST['m']) {
	case 'addFixed':
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $UserModel->std_beers, $UserModel->std_drinks)."<br>";
			$_SESSION['idsAdded'][] = $id;
		}
		break;
	case 'addSpecial':
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $_POST['beers'], $_POST['drinks'])."<br>";
			if(!in_array($id, $_SESSION['idsAdded']))
				$_SESSION['idsAdded'][] = $id;
		}
		break;
	}
}
?>