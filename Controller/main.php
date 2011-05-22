<?php 
include_once ("./Model/user_model.php");
session_start();


if (!isset($_SESSION['Admin']))
	$_SESSION['Admin'] = 0; 
	
class MainController {
	
	function search() {
		include "View/search_view.php";
	}
	function menu() {
		if (isset($_GET['view']))
			include "View/menu_view.php";
	}
	function view() {
		if (isset($_GET['view'])) {
			switch ($_GET['view']) {
				case "newVolunteer" : include "View/new_volunteer_view.php"; 
				break;
				case "editVolunteer" : include "View/edit_volunteer_view.php"; 
				break;
				default : include "View/grid_view.php";	
				break;
			}
		} else {
			include "View/entry_view.php";
		}
		
	}

	function setAdmin($val) {
		$_SESSION['Admin'] = $val;
	}
	function isAdmin() {
		return isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1;
	}
}
?>