<?php include_once "Controller/common_menu_func.php";?>

<?php
global $std_beers, $std_drinks;

if($_SESSION['Admin']) {
	include_once "View/admin_menu.php"; ?>

	<?php  } else {
		include_once "View/curator_menu.php"; ?>
		<?php } ?>