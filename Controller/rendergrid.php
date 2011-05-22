<?php
include_once ("../Model/user_model.php");
session_start();

function gridRow ($data) {

	echo "<tr><td id='name'>".utf8_encode($data->name->original)."</td>";
	echo "<td id='id'>".$data->id->current."</td>";
	echo "<td id='beers'>".$data->beers->original." =>".$data->beers->added."</td>";
	echo "<td id = 'drinks'>".$data->drinks->original." =>".$data->drinks->added."</td>";
	if($_SESSION['Admin']) 
		echo "<td id = 'active'>".$data->active->original."</td>";
	echo "<td><input type=\"checkbox\" name=\"user_id\" value=\"".$data->id->current."\"></td>";
	echo "</tr>";
}


function workGroup() {
	foreach($_SESSION['workgroup'] as $key => $volunteer) {	
		gridRow($volunteer);
	}	
}

if(isset($_GET["workgroup"])) {
	workGroup();
	
}

?>