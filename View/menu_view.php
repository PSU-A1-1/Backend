<?php 
global $std_beers, $std_drinks;
if($_SESSION['Admin']) { ?>

<script type="text/javascript">

$().ready(function() {
$("#newVolunteer").click(function() {	
		alert('clicked');
	});
$("#editVolunteer").click(function() {	
	alert('clicked');
});
$("#activateVolunteer").click(function() {	
	alert('clicked');
});
$("#statistics").click(function() {	
	alert('clicked');
});
});
	
</script>

<a id="newVolunteer" href="#">Tilf?j frivillig</a><br>
<a id="editVolunteer" href="#">Rediger frivillig</a><br>
<a id="activateVolunteer" href="#">Aktiver / Deaktiver</a><br>
<a id="statistics" href="#">Statistik</a><br>

<?php  } else { ?>

<script type="text/javascript">
function positiveNumeric (value) {
	return isFinite(value) && value >= 0;
}

$().ready(function() {
	$('#addFixedBox').hide();
	$('#addSpecialBox').hide();
	$("#addFixedButton").click(function() {
		var ids = new Array();
		$("input[@name='user_id[]']:checked").each(function() {ids.push($(this).val());});

		if (ids.length == 0) {
		    alert("Ingen brugere valgt");
		} else {
		    $.ajax({
			type: "POST",
			url: "Controller/edit.php",
			data: "m=addFixed&ids=" + ids.join('|'),
			dataType: "text",
			success: function (data) {
				alert('Øl og drinks point tilføjet');
				updateGrid ();
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
				alert(' Øl og drinks point tilføjet');
				updateGrid ();
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
	});	
	$("#menuSpecial").click(function() {	
		$('#addSpecialBox').toggle();
		$('#addFixedBox').hide();
	});	

	function updateGrid () {
		$('#grid tr:gt(0)').remove();
		$.ajax({
			type: "GET",
			cache: false,
			url: 'Controller/search.php',
			data: "ids=" + $("#gridAdded").val() ,
			success: function(data, textStatus) {
				$('#grid tr:last').after(data);
			}
		});
	}	
});
</script>
<a id="menuFixed" href="#">Tilføj standart</a><br>
<a id="menuSpecial" href="#">Tilføj antal</a>
<div id="confirmBox">
	<div id="addFixedBox">
	Tilføj <?php echo $std_beers; ?> øl og <?php echo $std_drinks; ?> drinks til valgte brugere?<br>
	<input type="button" value="OK" id="addFixedButton" />
	</div>
	
	<div id="addSpecialBox">
	Tilføj <input type="text" value="0" id="numBeers" size="1" maxlength="2" /> øl og <input type="text" value="0" id="numDrinks" size="1" maxlength="2" /> drinks til valgte brugere?<br>
	<input type="button" value="OK" id="addSpecialButton" />
	</div>
</div>
<br>

<?php } ?>