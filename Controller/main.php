<?php session_start();
if (!isset($_SESSION['Admin']))
	$_SESSION['Admin'] = 0; 
	
class MainController {
	function search() {
		include "View/search_view.php";
	}
	function menu() {
		include "View/menu_view.php";
	}
	function grid() {
		include "View/grid_view.php";
	}
	function setAdmin($val) {
		$_SESSION['Admin'] = $val;
	}
	function isAdmin() {
		return isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1;
	}
}
?>