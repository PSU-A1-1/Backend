<?php include_once "Controller/curator_menu.php";?>
<ul id="menu">
	<li><a id="menuFixed" href="#">Tilføj standart</a></li>
	<li><a id="menuSpecial" href="#">Tilføj antal</a></li>
	<li><a id="menuGuest" href="#">Tilføj til gæst / id</a></li>
</ul>



<div id="confirmBox">
	<div id="addFixedBox">
		Tilføj
		<?php echo $std_beers; ?>
		øl og
		<?php echo $std_drinks; ?>
		drinks til valgte brugere?<br> <input type="button" value="OK"
			id="addFixedButton" />
	</div>

	<div id="addSpecialBox">
		Tilføj <input type="text" value="0" id="numBeers" size="1"
			maxlength="2" /> øl og <input type="text" value="0" id="numDrinks"
			size="1" maxlength="2" /> drinks til valgte brugere?<br> <input
			type="button" value="OK" id="addSpecialButton" />
	</div>

	<div id="addGuestBox">
		Tilføj <input type="text" value="<?php echo $std_beers; ?>"
			id="numGuestBeers" size="1" maxlength="2" /> øl og <input type="text"
			value="<?php echo $std_drinks; ?>" id="numGuestDrinks" size="1"
			maxlength="2" /> drinks til id: <input type="text" value=""
			id="guestId" size="10" maxlength="16" />?<br> <input type="button"
			value="OK" id="addGuestButton" />
	</div>
</div>
<br>
