<?php include_once "Controller/common_menu_func.php";?>

<?php
global $std_beers, $std_drinks;

if($_SESSION['user'] == 2) {
	include_once "View/ViewAdminMenu.php";
	include_once "View/ViewCuratorMenu.php";
	 ?>

<?php  } else if ($_SESSION['user'] == 1) {
		include_once "View/ViewCuratorMenu.php"; ?>
		<?php } ?>