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
