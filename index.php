<?php 
include 'Controller/main.php'; 
$MainController = new MainController(); 

if (isset($_GET['admin']))
	$MainController->setAdmin($_GET['admin']);

if (!isset($_SESSION['idsAdded']))
	$_SESSION['idsAdded'] = array();

if (!isset($_SESSION['idsChanged']))
	$_SESSION['idsChanged'] = array();
	
$std_beers = 6;
$std_drinks = 4;
//Globale variabler ? 
//  skal nok hentes fra en tabel i databasen.


?>
<html>
<head>
<script type="text/javascript" src="View/lib/jquery.js"></script>
<script type='text/javascript' src='View/lib/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="View/lib/jquery.autocomplete.css" />
</head>
<body>
<table border="0" cellspacing="3" cellpadding="3" id="maintable">
<tr height="20%">
	<td></td>
	<td id="header"><img src="View/img/logo.jpg" /></td>
	<td></td>
</tr>
<tr>
	<td width="200px" height="80%" valign="top">
		<a href="?admin=1">Administrator</a><br>
		<a href="?admin=0">Afvikler</a><br>
		<?php $MainController->search(); ?>
	</td>
	<td valign="top" id="mainView"><?php $MainController->view(); ?>
	
	<!-- her kan smides test/fejl meddelser under udviklingen -->
	<div id="status"></div>
	
	</td>
	<td width="220px" valign="top" ><?php $MainController->menu(); ?></td>
</tr>
</table>
</body>
</html>