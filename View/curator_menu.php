<?php include_once "Controller/curator_menu.php";?>
<script type="text/javascript">
$().ready(function(){
		// simple accordion
		jQuery('#curator').accordion({
		autoheight: false,	
		active: false
		
		
		});
});
			

</script>

<div id="stylized" class="rightmenu" style="width:150px; background:none; ">

<h2>Afvikler</h2>
<p>So, what to do?</p>

<div style="color: #282826;" id="curator">

<!-- STANDARD -->
<a id="menuStandard" href="#" target="_self" style="margin:0; width:117px; margin-top:1px;">Tilføj standard</a>
<form id="form" name="form" method="post" style="float:left;">
<p style="float:left; margin-top:5px; margin-bottom:2px;">
Tilføj <?php echo $std_beers; ?> øl og <?php echo $std_drinks; ?> drinks til valgte brugere? 
</p>

<a href="#" id="addFixedButton" style="margin:0; margin-top:5px; margin-bottom:15px;">OK</a>
<div class="spacer"></div>

</form>



<!-- SPECIAL -->
<a id="menuSpecial" href="#" target="_self" style="margin:0; width:117px; margin-top:1px;">Tilføj antal</a>
<form id="form" name="form" method="post" style="float:left;">
<p style="float:left; margin-top:5px; margin-bottom:2px;">
Tilføj drikkevarer
</p>
<br style="clear: left;" /> 
<label style="font-weight:normal; margin-top:10px; margin-right:45px; width:auto; text-align:left;">ØL
</label>
<label style="font-weight:normal; margin-top:10px; width:auto; text-align:left;">Drinks
</label>
<br style="clear: left;" /> 
<input type="text" name="name" id="numBeers" value="0" maxlength="2" size="1" style="width:50px; margin:0; margin-top:5px; margin-right:5px;"/>
<input type="text" name="name" id="numDrinks" value="0" maxlength="2" size="1" style="width:50px; margin:0; margin-top:5px;"/>
<div class="spacer"></div>
<a href="#" id="addSpecialButton" style="margin:0; margin-top:5px; margin-bottom:15px;">OK</a>
<div class="spacer"></div>

</form>






<!-- GUEST -->
<a id="menuGuest" href="#" target="_self" style="margin:0; width:117px; margin-top:1px;">Tilføj til ID</a>
<form id="form" name="form" method="post" style="float:left;">
<p style="float:left; margin-top:5px; margin-bottom:2px;">
Tilføj drikkevarer til ID
</p>
<br style="clear: left;" /> 

<label style="font-weight:normal; margin-top:10px; margin-right:45px; width:auto; text-align:left;">ØL
</label>
<label style="font-weight:normal; margin-top:10px; width:auto; text-align:left;">Drinks
</label>
<input type="text" name="name" id="numGuestBeers" value="6" maxlength="2" size="1" style="width:50px; margin:0; margin-top:5px; margin-right:5px;"/>
<input type="text" name="name" id="numGuestDrinks" value="4" maxlength="2" size="1" style="width:50px; margin:0; margin-top:5px;"/>
<br style="clear: left;" /> 

<label style="font-weight:normal; margin-top:10px; margin-right:49px; width:auto; text-align:left;">ID
</label>
<input type="text" name="name" id="guestId" maxlength="5" size="1" style="width:50px; margin:0; margin-top:5px;"/>
<div class="spacer"></div>
<a href="#" id="addGuestButton" style="margin:0; margin-top:5px; margin-bottom:15px;">OK</a>
<div class="spacer"></div>

</form>


</div>



<div class="spacer"></div>

</div>


