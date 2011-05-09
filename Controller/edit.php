<?php
if(isset($_POST['m'])) {
	include_once "../Model/user_model.php";
	$UserModel = new User();
	switch ($_POST['m']) {
	case 'addFixed':
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $UserModel->std_beers, $UserModel->std_drinks)."<br>";
		}
		break;
	case 'addSpecial':
		foreach(explode("|", $_POST['ids']) as $id) {
			echo $UserModel->addPoints($id, $_POST['beers'], $_POST['drinks'])."<br>";
		}
		break;
	}
}
?>