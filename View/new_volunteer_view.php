<script type="text/javascript">

$().ready(
		function() 
		{
			$("#volunteerAdd").click(function() 
			{	
	
			
			if ($('#volunteerName').val() != "" && $('#volunteerSurName').val() != "" ) {
				
				var name = $('#volunteerName').val();
				var surName = $('#volunteerSurName').val();
				var aktiv = parseInt($('#aktiv').attr('checked')?1:0);

				$.ajax({
					type: "POST",
					url: "Controller/edit.php",
					data: "m=newVolunteer" + "&name=" + name + "&s_name=" + surName + "&aktiv=" + aktiv,
					dataType: "text",
					success: function (data) {
						// TODO : Better dialog box. ie. yes / no
						confirm(data);
						
					  },
					error: function(request, error){
					    alert(error);
					  }
					});
				
			} else {
				alert("Udfyld Fornavn og Efternavn");
				}
			});
		});
</script>


<form action="" method="post" >
Tilføj ny frivillig<br><br>
Fornavn<br> 
<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
<br>
Efternavn<br>
<input type="text" name="name" id="volunteerSurName" /> <input type='hidden' id='volunteerSurName' />
<br>
<input type="checkbox" name="aktiv" checked="checked" /> Aktiv<br />
<br>
<input type="button" value="OK" id="volunteerAdd">
</form> 