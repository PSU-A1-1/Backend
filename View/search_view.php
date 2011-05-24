<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>

<form action="" method="post">
	Søg<br> 
	<input type="text" name="name" id="searchName" /> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />

	<a href="#" class="button" id="searchAdd">Tilføj</a> 
	<a href="#" class="button" id="showAll">Vis alle</a> 
	<a href="#" class="button" id="workgroup" style="clear:none;">Workgroup</a> 
	<!--  <input class="button" type="button" value="Tilføj" id="searchAdd"><br><br> -->
	<!--  <input type="button" value="Vis alle" id="showAll"> <input type="button" value="Workgroup" id="workgroup">-->
</form>
