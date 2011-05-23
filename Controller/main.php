<?php 
include_once ("./Model/user_model.php");
session_start();

if (!isset($_SESSION['Admin']))
	$_SESSION['Admin'] = 0; 
	
class MainController {

	function setAdmin($val) {
		$_SESSION['Admin'] = $val;
	}
	function isAdmin() {
		return isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1;
	}
}
?>