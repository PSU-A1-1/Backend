<?php include_once "Controller/curator_menu.php";?>


<a id="menuFixed" href="#">Tilf�j standart</a>
<br>
<a id="menuSpecial" href="#">Tilf�j antal</a>
<br>
<a id="menuGuest" href="#">Tilf�j til g�st / id</a>
<div id="confirmBox">
	<div id="addFixedBox">
		Tilf�j
		<?php echo $std_beers; ?>
		�l og
		<?php echo $std_drinks; ?>
		drinks til valgte brugere?<br> <input type="button" value="OK"
			id="addFixedButton" />
	</div>

	<div id="addSpecialBox">
		Tilf�j <input type="text" value="0" id="numBeers" size="1"
			maxlength="2" /> �l og <input type="text" value="0" id="numDrinks"
			size="1" maxlength="2" /> drinks til valgte brugere?<br> <input
			type="button" value="OK" id="addSpecialButton" />
	</div>

	<div id="addGuestBox">
		Tilf�j <input type="text" value="<?php echo $std_beers; ?>"
			id="numGuestBeers" size="1" maxlength="2" /> �l og <input type="text"
			value="<?php echo $std_drinks; ?>" id="numGuestDrinks" size="1"
			maxlength="2" /> drinks til id: <input type="text" value=""
			id="guestId" size="10" maxlength="16" />?<br> <input type="button"
			value="OK" id="addGuestButton" />
	</div>
</div>
<br>