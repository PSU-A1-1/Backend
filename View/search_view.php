<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>


<br style="clear: left;" /> 
<br style="clear: left;" /> 
<div id="stylized" class="search">
<form id="form" name="form" method="post">
<h2>Søg</h2>
<p>Søg efter frivillige</p>
<input type="text" name="name" id="searchName" style="width:150px; margin:0;"/> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
<div class="spacer"></div>
<a href="#" id="searchAdd" style="margin:0; margin-top:10px;">Tilføj</a>
<div class="spacer"></div>

</form>
</div>
<!--  
<form action="" method="post">
<div style="margin-top:20px">
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
	
</div>
	
	
	
	<!--  <input class="button" type="button" value="Tilføj" id="searchAdd"><br><br> -->
	<!--  <input type="button" value="Vis alle" id="showAll"> <input type="button" value="Workgroup" id="workgroup">-->
</form>

<!-- 
<div>
	<ul id="box">

	<li>
	<label for="numBeers">Øl</label> 
	<input type="text" value="0" id="numBeers" size="1" maxlength="2" />
	</li>
	<li>	
	<label>Drinks<input type="text" value="0" id="numDrinks" size="1" maxlength="2" /> </label> 
	<input type="button" value="OK" id="addSpecialButton" />
	</li>
	
	</ul>
	
	
	
	<ul id="button">
	<li><a href="#" class="button" id="searchAdd">Tilføj</a> </li>
	<li><a href="#" class="button" id="showAll">Vis alle</a> </li>
	<li><a href="#" class="button" id="workgroup" style="clear:none;">Workgroup</a> </li>

</ul>	
	
</div>
 -->
