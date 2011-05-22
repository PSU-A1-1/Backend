<?php 
// Exp.
// Debug
ini_set('display_errors',1); 
error_reporting(E_ALL);

include 'Controller/main.php'; 
//include ("./Model/user_model.php");
//require "./Model/user_model.php";

$MainController = new MainController(); 
//$User = new Volunteer("kasper", "helweg", 56, 10, 10, 1);                                                      

if (isset($_GET['admin']))
	$MainController->setAdmin($_GET['admin']);

if (!isset($_SESSION['idsAdded']))
	$_SESSION['idsAdded'] = array();

if (!isset($_SESSION['idsChanged']))
	$_SESSION['idsChanged'] = array();
	
if (!isset($_SESSION['workgroup']))
	$_SESSION['workgroup'] = array();
	
$std_beers = 6;
$std_drinks = 4;

?>
<html>
<head>
<script type="text/javascript" src="View/lib/jquery.js"></script>
<script type='text/javascript' src='View/lib/jquery.autocomplete.js'></script>
<script type="text/javascript" src="View/lib/jquery.url.min.js"></script>
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="View/lib/jquery.autocomplete.css" />

</head>
<body>
<table border="2" id="maintable">
<tr height="20%">
	<td></td>
	<td>Header</td>
	<td></td>
</tr>
<tr>
	<td width="200px" height="80%" valign="top">
		<a href="?view&admin=1">Administrator</a><br>
		<a href="?view&admin=0">Afvikler</a><br>
		<?php $MainController->search(); ?>
	</td>
	<td valign="top"><?php $MainController->view(); ?>
	
	<!-- her kan smides test/fejl meddelser under udviklingen -->
	<div id="status"><?php 
	var_dump( $_SESSION['workgroup']);
	
	  //echo $User->id->current . '<br>';
	  
	  //if ($User->updateDrinks(10)) {
	  	//echo "succes" . '<br>';
	  	//var_dump($User);
	 // } else {
	  	//echo $User->error;
	  //}
	  
	  
	  //echo $User->name->name;
	
	?></div>
	
	</td>
	<td width="220px" valign="top" ><?php $MainController->menu(); ?></td>
</tr>
</table>
</body>
</html>