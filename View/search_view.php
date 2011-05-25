<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>

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


<form action="" method="post">
<h3>Tilføj</h3>
		<fieldset>	
		  <p>
			  <label class="field-first">Øl
			    <input name="first_name" type="text" value="" />
		      </label>
			  <label class="field-last">Drinks
			    <input type="text" name="last_name" value="" />
		      </label>
		  </p>
			<p><br style="clear: left;" />
		    <a class="button" href="#">sdfsdf</a></p>
		</fieldset>
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
