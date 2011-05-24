<script type="text/javascript">

$().ready(
		function() 
		{

			// Format form -- These are duplicate functions...maybe refactor.
			var max = 0;
		    $("label").each(function(){
		        if ($(this).width() > max)
		            max = $(this).width();   
		    });
		    $("label").width(max);
			
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
						var c = confirm(data);
						if (c) {
							var base_url = './?view=';
							document.location.href = base_url + "newVolunteer";
						} else {
							var base_url = './?view=';
							document.location.href = base_url + "workgroup";
						}
						
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
<p>
<label for="volunteerName">Fornavn</label> 
<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
</p>
<br>
<p>
<label for="volunteerSurName">Efternavn</label> 
<input type="text" name="name" id="volunteerSurName" /> <input type='hidden' id='volunteerSurName' />
</p>
<br>
<p>
<label for="aktiv">Aktiv</label> 
<input type="checkbox" name="aktiv" id="aktiv" checked="checked" />
</p>
<br><br>
<input type="button" value="OK" id="volunteerAdd">
</form> 



