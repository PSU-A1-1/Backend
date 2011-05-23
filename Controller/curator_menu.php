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
					alert("Tilf�jet");
					
					var base_url = './?view=';
			    	document.location.href = base_url + "workgroup";
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
			alert("Kun positive antal �l/drinks point kan tilf�jes");
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
					alert('�l og drinks point tilf�jet');
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
			alert("Kun positive antal �l/drinks point kan tilf�jes");
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
					alert(' �l og drinks point tilf�jet');
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