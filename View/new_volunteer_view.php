<script type="text/javascript">

$().ready(
		function() 
		{

			$('#volunteerName').focus();

			
			
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


<form action="" method="post">
	Tilføj ny frivillig<br> <br>

	<ul id="stylized">
		<li>
		<label for="volunteerName">Fornavn</label> 
		<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
		</li>
		<li>
		<label for="volunteerSurName">Efternavn</label> 
		<input type="text" name="name" id="volunteerSurName" /> <input type='hidden' id='volunteerSurName' />
		</li>
	
		<li style="display:inline; float:left;">
		<label style="display:inline; float:none;" for="aktiv">Aktiv</label>
		<input type="checkbox" name="aktiv" id="aktiv"   checked="checked" />
		</li>
		<ul id="button">
		<li><a href="#" id="volunteerAdd" >OK</a> </li>
		</ul>
	</ul>


	
	
</form>



