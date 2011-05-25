<script type="text/javascript">
function updateGrid (ids) {
		$('#grid tr:gt(0)').remove();
		$.ajax({
			type: "GET",
			cache: false,
			url: 'Controller/search.php',
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
		

			// Format form
			var max = 0;
		    $("label").each(function(){
		        if ($(this).width() > max)
		            max = $(this).width();   
		    });
		    $("label").width(max);

			
			// Get volunteer and set fields.
			$.ajax({
					type: "POST",
					url: "Controller/edit.php",
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
						url: "Controller/exp.php",					
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
					url: "Controller/edit.php",
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


<form action="" method="post">
	Rediger frivillig<br> <br>
	<ul id="stylized">
		<li>
		<label for="volunteerName">Fornavn</label> 
		<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
		</li>
		<li>
		<label for="volunteerSurName">Efternavn</label> 
		<input type="text" id="volunteerSurName" /> <input type='hidden' id='volunteerSurName' />
		</li>
		
		<li style="display:inline; float:left;">
		<label for="id">ID</label> 
		<input type="text" size="5" id="id" readonly style="display:inline; float:left;"/>
		<ul id="button">
			<a href="#" id="newID" style="clear:none; margin-top:0px; margin-left:5px">=></a> 
		</ul>
		</li>

		<li style="display:inline; float:left;">
		<label for="aktiv" style="display:inline; float:none;">Aktiv</label>
		<input type="checkbox" name="aktiv" id="aktiv" checked="checked" />
		</li>

	</ul>
	<ul id="button">
		<li><a href="#" id="volunteerEdit" >OK</a> </li>
	</ul>
	
</form>
