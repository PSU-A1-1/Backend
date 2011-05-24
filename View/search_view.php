<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>

<form action="" method="post">
	<ul id="stylized">
	<li>
		<label for="searchName">Søg</label> 
		<input type="text" name="name" id="searchName" /> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
		</li>
	</ul>
	<ul id="button">
	<li><a href="#" class="button" id="searchAdd">Tilføj</a> </li>
	<li><a href="#" class="button" id="showAll">Vis alle</a> </li>
	<li><a href="#" class="button" id="workgroup" style="clear:none;">Workgroup</a> </li>

</ul>	
	

	
	
	
	<!--  <input class="button" type="button" value="Tilføj" id="searchAdd"><br><br> -->
	<!--  <input type="button" value="Vis alle" id="showAll"> <input type="button" value="Workgroup" id="workgroup">-->
</form>
