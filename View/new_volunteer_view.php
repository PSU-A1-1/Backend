<script type="text/javascript">

$().ready(
		function() 
		{
			$("#volunteerAdd").click(function() 
			{	
			if ($('#volunteerName').val() != "") {
				alert("cool");
			} else {
				alert("not cool");
				}
			
			// ((alert($('#volunteerName').val());
			// var beers = parseInt($('#numBeers').val());
			
		
			});
		});

</script>

<form action="" method="post" >
Tilføj ny frivillig<br> 
<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
<input type="button" value="OK" id="volunteerAdd">
</form> 