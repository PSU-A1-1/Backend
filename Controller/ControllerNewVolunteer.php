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
			    var volID = $('#volunteerId').val();
				var aktiv = parseInt($('#aktiv').attr('checked')?1:0);


				$.ajax({
					type: "POST",
					url: "Model/ModelMenu.php",
					data: "m=newVolunteer" + "&name=" + name + "&s_name=" + surName + "&s_id=" + volID + "&aktiv=" + aktiv,
					dataType: "text",
					success: function (data) {
						// TODO : Better dialog box. ie. yes / no
						var c = confirm(data + "\n\nVil du tilføje endnu en frivillig?");
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
				alert("Udfyld Fornavn, Efternavn og ID");
				}
			});
		});
</script>