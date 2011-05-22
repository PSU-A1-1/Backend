<script type="text/javascript">

$().ready(function() {

	$("#editVolunteer").click(function() 
	{	
		var ids = getChecks();

		switch (howManyChecks(ids)) 
		{
			case 'none' :
				alert(tooFew);
				break;
			case 'many' :
				alert(tooMany);
				break;
			case 'one' :
				var base_url = './?view=editVolunteer';
	        	document.location.href = base_url + "&id=" + ids[0];
	        	break;
		}
	});
	
	$("#activateVolunteer").click(function() {	
	var ids = getChecks();
	// Fixed a bug not discriminating checked names. What about the others?
	//$("input:checkbox[name=user_id]:checked").each(function() {ids.push($(this).val());});

	if (ids.length == 0) {	
	    alert(tooFew);
	} else {
		    $.ajax({
			type: "POST",
			url: "Controller/edit.php",
			data: "m=activate&ids=" + ids.join('|'),
			dataType: "text",
			success: function (data) {
				alert('Status opdateret');
				updateGrid (ids.join(', '));
				
			  },
			error: function(request,error){
			    alert(error);
			  }
			});
		}
});

$("#statistics").click(function() {	
	alert('clicked');
});
});

</script>

<a id="newVolunteer" href="?view=newVolunteer">Tilføj frivillig</a>
<br>
<a id="editVolunteer" href="#">Rediger frivillig</a>
<br>
<a id="activateVolunteer" href="#">Skift status</a>
<br>
<a id="statistics" href="#">Statistik</a>
<br>