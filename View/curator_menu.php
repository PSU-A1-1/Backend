<?php include_once "Controller/curator_menu.php";?>
<script type="text/javascript">
$().ready(function(){
		// simple accordion
		jQuery('#curator').accordion({
		autoheight: false,	
		active: false, 
		animated: false
		});
});
			


</script>

<div id="menu">
	<div style="color: #FFFFFF" id="curator">


		<a id="menuStandard" href="#">Tilføj standard</a>

		<div id="box" style="padding: 7px;">
			Tilføj <?php echo $std_beers; ?> øl og <?php echo $std_drinks; ?> drinks til valgte brugere? 
			<input type="button" value="OK" id="addFixedButton" />

		</div>



		<a id="menuSpecial" href="#">Tilføj antal</a>


		<div id="box" style="padding: 7px;">


			<li>
			<label for="numBeers">Øl</label> <input type="text" value="0" id="numBeers" size="1" maxlength="2" />
			</li>
		
			<label for="numDrinks">Drinks</label> <input type="text" value="0" id="numDrinks" size="1" maxlength="2" /> 
			<input type="button" value="OK" id="addSpecialButton" />
		</div>


		<a id="menuGuest" href="#">Tilføj til gæst</a>


		<div id="box" style="padding: 7px;">
		
			<li>
			<label for="numGuestBeers">Øl</label> <input type="text" value="<?php echo $std_beers; ?>" id="numGuestBeers" size="1" maxlength="2" /> 
			</li>
			
			<label for="numGuestDrinks">Drinks</label> 
			<input type="text" value="<?php echo $std_drinks; ?>" id="numGuestDrinks" size="1" maxlength="2" /> 
			
			<label for="guestId">ID</label>
			
			<input type="text" value="" id="guestId" size="10" maxlength="16" /><br> <input type="button" value="OK" id="addGuestButton" />

		</div>
		
	
	</div>
</div>
