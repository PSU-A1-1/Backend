<script type="text/javascript">
function positiveNumeric (value) {
	return isFinite(value) && value >= 0;
}

$().ready(function() {
	$('#addFixedBox').hide();
	$('#addSpecialBox').hide();
	$('#addGuestBox').hide();
	$("#addFixedButton").click(function() {
		
		var ids = getChecks();
		
		if (ids.length == 0) {
		    alert(tooFew);
		} else {
			
		    $.ajax({
			type: "POST",
			url: "Controller/edit.php",
			data: "m=addFixed&ids=" + ids.join('|'),
			dataType: "text",
			success: function (data) {
				if (data == "Error") {
					alert('Fejl i tildeling af point');
				} else {
					alert("Tilf¿jet");
					renderWorkGroup();
					//var base_url = './?view=workGroup';
		        	//document.location.href = base_url;
					//updateGrid (ids.join(', '));
				}
			  },
			error: function(request,error){
			    alert('Fejl i tildeling af point');
			  }
			});
		}
	});	
	$("#addSpecialButton").click(function() {
		var ids = new Array();
		$("input[@name='user_id[]']:checked").each(function() {ids.push($(this).val());});
		var beers = parseInt($('#numBeers').val());
		var drinks = parseInt($('#numDrinks').val());
		
		if (ids.length == 0) {
		    alert("Ingen brugere valgt");
		} else if (!(positiveNumeric(beers) && positiveNumeric(drinks))) {
			alert("Kun positive antal øl/drinks point kan tilføjes");
		} else {
		    $.ajax({
			type: "POST",
			url: "Controller/edit.php",
			data: "m=addSpecial&ids=" + ids.join('|') + "&beers=" + beers + "&drinks=" + drinks,
			dataType: "text",
			success: function (data) {	
				if (data == "Error") {
					alert('Fejl i tildeling af point');
				} else {
					alert('Øl og drinks point tilføjet');
					updateGrid (ids.join(', '));
				}
			  },
			error: function(request,error){
			    alert('Fejl i tildeling af point');
			  }
			});
		}
	});	
	$("#addGuestButton").click(function() {
		var id = $('#guestId').val();
		var beers = parseInt($('#numGuestBeers').val());
		var drinks = parseInt($('#numGuestDrinks').val());
		
		if (id == "" || !positiveNumeric(id)) {
		    alert("Ingen brugere valgt");
		} else if (!(positiveNumeric(beers) && positiveNumeric(drinks))) {
			alert("Kun positive antal øl/drinks point kan tilføjes");
		} else {
		    $.ajax({
			type: "POST",
			url: "Controller/edit.php",
			data: "m=addGuest&id=" + id + "&beers=" + beers + "&drinks=" + drinks,
			dataType: "text",
			success: function (data) {
				if (data == "Error") {
					alert('Fejl i tildeling af point');
				} else {
					alert(' Øl og drinks point tilføjet');
					updateGrid (id);
				}
			  },
			error: function(request,error){
			    alert('Fejl i tildeling af point');
			  }
			});
		}
	});	
	$("#menuFixed").click(function() {	
		$('#addFixedBox').toggle();
		$('#addSpecialBox').hide();	
		$('#addGuestBox').hide();	
	});	
	$("#menuSpecial").click(function() {	
		$('#addSpecialBox').toggle();
		$('#addFixedBox').hide();
		$('#addGuestBox').hide();
	});	
	$("#menuGuest").click(function() {	
		$('#addGuestBox').toggle();
		$('#addFixedBox').hide();
		$('#addSpecialBox').hide();
	});

		
});
</script>
<a id="menuFixed" href="#">Tilføj standart</a>
<br>
<a id="menuSpecial" href="#">Tilføj antal</a>
<br>
<a id="menuGuest" href="#">Tilføj til gæst / id</a>
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