<script type="text/javascript">

$().ready(
		function() 
		{
			// A few vars.
			var idChanged = false;
			var id = $.url.param("id");

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
					dataType: 'json',
					success: function (data) {
						var result = new Object;
						result = JSON.parse(data);
						
						$("input:text[id=volunteerName]").val(result.name);
					    $("input:text[id=id]").val(id);
					    
						//confirm(result.name);
						
					  },
					error: function(request, error){
					    alert(error);
					  }
					});

			$("#newID").click(function() {	

				idChanged = true;

				});
			
			$("#volunteerEdit").click(function() 
			{	
				
			
			if ($('#volunteerName').val() != "" && $('#volunteerSurName').val() != "" ) {

				if (idChanged) 
					alert ("yo");
				
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
Rediger frivillig<br><br>
<p>
<label for="volunteerName">Fornavn</label> 
<input type="text" id="volunteerName" /> <input type='hidden' id='volunteerName' />
<br>
</p>

<p>
<label for="volunteerSurName">Efternavn</label> 
<input type="text" id="volunteerSurName" /> <input type='hidden' id='volunteerSurName' />
</p>
<br>
<p>
<label for="id">ID</label> 
<input type="text" size="5" id="id" readonly />
<br>
</p>
<p>
<label for="aktiv">Aktiv</label> 
<input type="checkbox" id="aktiv" checked="checked" />
</p>
<br>
<p>
<label for="newID">Nyt ID</label> 
<input type="button" value="Increment" id="newID">
</p>
<input type="button" value="OK" id="volunteerEdit">
</form> 