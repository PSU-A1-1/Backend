<?php
include_once ("./Model/user_model.php");
include_once ("./Model/cardholder.php");
include_once ("./Model/volunteer.php");
session_start();

if (!isset($_SESSION['Admin'])) {
	$_SESSION['Admin'] = 0;
}


class ViewMachine {
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
				case "newVolunteer" : include_once "View/new_volunteer_view.php";
				break;
				case "editVolunteer" : include_once "View/edit_volunteer_view.php";
				break;
				case "workGroup" : include_once "View/workgroup_view.php"; //workGroup();
				break;
				case "showall" : include_once "View/grid_view.php"; //workGroup();
				break;
				default : include_once "View/grid_view.php";
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











