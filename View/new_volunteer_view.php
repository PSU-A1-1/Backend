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

<div id="stylized" class="myform">
<form id="form" name="form" method="post">
<h1>Tilføj frivillig</h1>
<p>Her tilføjes nye frivillige</p>

<label>Fornavn
<span class="small">Frivilligs fornavn</span>
</label>
<input id="volunteerName" type="text" value="" name="name"/>

<label>Efternavn
<span class="small">Frivilligs efternavn</span>
</label>
<input id="volunteerSurName" type="text" value="" name="email"/>

<div class="spacer"></div>
<label>Aktiv
<span class="small">Aktiver eller deaktiver frivillig</span>
</label>
<input type="checkbox" checked="checked" style="clear:none; margin:2px 0 20px 10px;"/> 
<div class="spacer"></div>
<a href="#" id="volunteerAdd">Tilføj</a>
<div class="spacer"></div>

</form>
</div>

<!--  

<div id="menu">
		<form action="" method="post" style="padding: 10px;">
			<fieldset>
				<p>
					<label class="field-first">Fornavn
					<input name="first_name" id="volunteerName" type="text" value=""  maxlength="25" style="width:150px;"/> 
					<input type='hidden' id='volunteerName' />
					</label>
					</p>
					
					<p>
					<br style="clear: left;" /> 
					<label class="field-last">Efternavn 
					<input type="text" name="last_name" id="volunteerSurName" value=""  maxlength="25" style="width:150px;" />
					<input type='hidden' id='volunteerSurName' />
					</label>
				</p>
				<fieldset>
				<input id="aktiv" type="checkbox" name="aktiv" checked="checked" /> <label for="checkbox_1" class="field-checkbox">Aktiv</label>
				</fieldset>
				<p>
					<br style="clear: left;" /> 
					<a href="#" id="volunteerAdd">OK</a>
				</p>

			</fieldset>
		</form>
</div>


-->



