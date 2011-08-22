<script type="text/javascript">
function updateGrid (ids) {
		$('#grid tr:gt(0)').remove();
		$.ajax({
			type: "GET",
			cache: false,
			url: 'Model/ModelSearch.php',
			data: "ids=" + ids ,
			success: function(data, textStatus) {
				$('#grid tr:last').after(data);
			}
		});
	}
	</script>

<script type="text/javascript">

$().ready(
		function() 
		{
			$('#volunteerName').focus();
			// A few vars.
			var idChanged = false;
			var id = parseInt($.url.param("id"));

			// Get volunteer and set fields.
			$.ajax({
					type: "POST",
					url: "Model/ModelMenu.php",
					data: "m=getVolunteer" + "&id=" + id,
					
					success: function (data) {
						var result = new Object;
						
						result = JSON.parse(data);
						
					    $("input:text[id=volunteerName]").val(result.first_name);
						$("input:text[id=volunteerSurName]").val(result.surname);
						$("input:checkbox[id=aktiv]").attr("checked", parseInt(result.active));
						$("input:text[id=id]").val(result.id);
						
					  },
					error: function(request, error){
					    alert(error);
					  }
					});

			$("#newID").click(function() {	

				
				$.ajax({
						type: "POST",
						url: "Model/ModelMenu.php",		
						data: "m=newId",			
						success: function (data) {
							idChanged = true;
							$("input:text[id=id]").val(data);
							$("input:text[id=id]").addClass('changed');

						  },
						error: function(request, error){
						    alert(error);
						  }
						});
				});
			
			$("#volunteerEdit").click(function() 
			{	

			if ($('#volunteerName').val() != "" && $('#volunteerSurName').val() != "" ) {

				var name = $("input:text[id=volunteerName]").val();
				var surName = $("input:text[id=volunteerSurName]").val();
				var aktiv = parseInt($("input:checkbox[id=aktiv]").attr('checked')?1:0);
				var newId = parseInt($("input:text[id=id]").val());

			
				$.ajax({
					type: "POST",
					url: "Model/ModelMenu.php",
					data: "m=updateVolunteer" + "&name=" + name 
						   + "&s_name=" + surName + "&aktiv=" + aktiv + "&newid=" + newId + "&oldid=" + id ,
					dataType: "text",
					success: function (data) {
						// TODO : Better dialog box. ie. yes / no
						confirm(data);
						var base_url = './?view=';
				    	document.location.href = base_url + "workgroup";
						
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