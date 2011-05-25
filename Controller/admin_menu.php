<script type="text/javascript">
var base_url = './?view=';


$().ready(function() {

	$("#newVolunteer").click(function() 
			{document.location.href = base_url + 'newVolunteer';});

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
	        	document.location.href = base_url + 'editVolunteer' + "&id=" + ids[0];
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
		    	document.location.href = base_url + "workgroup";
				
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
