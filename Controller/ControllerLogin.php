<script type="text/javascript">

$().ready(
		function() 
		{

			$('#user').focus();

			
			
			$("#login").click(function() 
			{	
	
			
			if ($('#user').val() != "" && $('#pass').val() != "" ) {
				
				var user_name = $('#user').val();
				var password = $('#pass').val();

			       
				$.ajax({
					type: "POST",
					url: "Model/ModelLogin.php",
					data: "userAction=login" + "&user=" + user_name + "&pass=" + password,
					dataType: "text",
					success: function (data) {
						// TODO : Better dialog box. ie. yes / no
						if (!data) {
							alert("Brugernavn eller password er forkert");
						}

					    var base_url = './?view=';
					    document.location.href = base_url + "showAll";

					  },
					error: function(request, error){
					    alert(error);
					  }
					});
				
			} else {
				alert("Udfyld Brugernavn og Password");
				}
			});
		});
</script>