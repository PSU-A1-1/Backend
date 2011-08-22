<?php
// Exp.
// Debug
ini_set('display_errors',1);
error_reporting(E_ALL);

// Move this stuff....
if (!isset($_SESSION['user'])) {
	include_once 'Model/ModelInterface.php';

// Main view controller
	include_once 'Controller/ControllerView.php';
	$ViewMachine = new ControllerView();
}


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
	<script type="text/javascript" src="View/lib/jquery.color.js"></script>
	<script type="text/javascript" src="View/lib/jquery.accordion.js"></script>
	<script type="text/javascript" language="javascript" src="View/lib/jquery.dataTables.js">
</script>



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
	
			<?php $ViewMachine->leftMenu(); ?>
						
			</td>
		
			<td valign="top" id="mainView"><?php $ViewMachine->view(); ?> 
		
			<!-- her kan smides test/fejl meddelser under udviklingen -->
			<div id="status">
			  
				<?php
				  //echo $_SESSION['user'];
				?>
			</div>
			</td>
			<td width="220px" valign="top"><?php $ViewMachine->menu(); ?></td>
		</tr>
	</table>
</body>
</html>
