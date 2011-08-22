<!--  <input type='hidden' id='gridAdded' value="0" /><br> -->
<?php include_once "Controller/ControllerGrid.php";?>

<link rel="stylesheet" type="text/css" href="View/CSS/pagination.css" />

<table border="0" id="grid" class="display">
<thead>
	<tr align="left">
		<th align="left" width="40%">Navn</th>
		<th width="20%">ID</th>
		<th width="100">Øl</th>
		<th width="100">Drinks</th>
		<?php if($_SESSION['user'] == 2) { ?>
		<th width="10%">Aktiv</th>
		<?php } ?>
		<th width="10%">&nbsp;</th>
	</tr>
	</thead>
	<tbody id="gridbody">
	<tr align="left">
	</tr>
	</tbody>
</table>

