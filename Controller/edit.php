<?php session_start();
function idChange ($id, $beers, $drinks) {
	if (!isset($_SESSION['idsChanged'][$id])) {
		$_SESSION['idsChanged'][$id] = "$beers, $drinks";
	} else {
		$t = explode(", ", $_SESSION['idsChanged'][$id]);
		$_SESSION['idsChanged'][$id] = ($t[0]+$beers) . ", " . ($t[1]+$drinks);
	}
}
if(isset($_POST['m'])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	switch ($_POST['m']) {
	case 'addFixed':
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $UserModel->std_beers, $UserModel->std_drinks)."<br>";
			if (!in_array($id, $_SESSION['idsAdded'])) {
				$_SESSION['idsAdded'][] = $id;
			}	
			idChange($id, $UserModel->std_beers, $UserModel->std_drinks);
		}
		break;
	case 'addSpecial':
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $_POST['beers'], $_POST['drinks'])."<br>";
			if(!in_array($id, $_SESSION['idsAdded']))
				$_SESSION['idsAdded'][] = $id;
			idChange($id, $_POST['beers'], $_POST['drinks']);
		}
		break;
	case 'addGuest':
		foreach($_SESSION['idsAdded'] as $key => $id) { unset($_SESSION['idsAdded'][$key]); }
		$id = $_POST['id'];
		echo $UserModel->addPoints($id, $_POST['beers'], $_POST['drinks'])."<br>";
		if(!in_array($id, $_SESSION['idsAdded']))
				$_SESSION['idsAdded'][] = $id;
		idChange($id, $_POST['beers'], $_POST['drinks']);
		break;
	}
}
?>