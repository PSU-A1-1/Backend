<?php
// Exp.
// Debug
ini_set('display_errors',1);
error_reporting(E_ALL);

//include 'Controller/main.php';
include_once 'Controller/viewmachine.php';
//include_once "Model/user.php";

$ViewMachine = new ViewMachine();
//$User = new User();

if (isset($_GET['admin']))
$ViewMachine->setAdmin($_GET['admin']);

if (!isset($_SESSION['idsAdded']))
$_SESSION['idsAdded'] = array();

if (!isset($_SESSION['idsChanged']))
$_SESSION['idsChanged'] = array();

if (!isset($_SESSION['workgroup']))
$_SESSION['workgroup'] = array();

//if (!isset($_SESSION['user']))
//$_SESSION['user'] = $User;


$std_beers = 6;
$std_drinks = 4;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Stengade</title>

<script type="text/javascript" src="View/lib/jquery.js"></script>
<script type='text/javascript' src='View/lib/jquery.autocomplete.js'></script>
<script type="text/javascript" src="View/lib/jquery.url.min.js"></script>

<script type="text/javascript" src="View/lib/chili-1.7.pack.js"></script>
	<script type="text/javascript" src="View/lib/jquery.easing.js"></script>

	<script type="text/javascript" src="View/lib/jquery.dimensions.js"></script>
	<script type="text/javascript" src="View/lib/jquery.accordion.js"></script>



<link rel="stylesheet" type="text/css" href="View/lib/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="View/CSS/main.css" />
</head>

<body>
	<table border="0" id="toptable">
	<tr>
			<td width="200px"></td>
			<td  id="header">
				<img src="View/img/logo.jpg" />
			</td>
			<td width="220px"></td>
		</tr>
	</table>
	<table border="0" cellspacing="3" cellpadding="3" id="maintable">
		
		<tr>
			<td width="200px" valign="top">

				<div id="stylized" class="search">
					<form id="form" name="form" method="post">
						<h2>Rolle</h2>
						<p>Admin eller Afvikler</p>
						<a href="?view&admin=1"
							style="margin: 0; margin-top: 0px; clear:none; float: left;">Administrator</a>
						<a href="?view&admin=0"
							style="margin: 0; margin-top: 0px; margin-left:4px; clear:none; float: left;">Afvikler</a>
						<div class="spacer"></div>

					</form>
				</div> 
				
			<?php $ViewMachine->search(); ?>
			
			</td>
			<td valign="top" id="mainView"><?php $ViewMachine->view(); ?> 
			<!-- her kan smides test/fejl meddelser under udviklingen -->
			<div id="status">
				<?php
				//var_dump( $_SESSION['workgroup']);
				?>
			</div>
			</td>
			<td width="220px" valign="top"><?php $ViewMachine->menu(); ?></td>
		</tr>
	</table>
</body>
</html>
