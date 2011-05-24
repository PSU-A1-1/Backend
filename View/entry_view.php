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

		});
		</script>

<form action="" method="post" >
Login<br><br>
<p>
<label for="volunteerName">Bruger</label> 
<input type="text" name="name" id="volunteerName" /> <input type='hidden' id='volunteerName' />
</p>
<br>
<p>
<label for="password">password</label> 
<input type="text" name="name" id="password" /> <input type='hidden' id='volunteerSurName' />
</p>
<br><br>
<input type="button" value="OK" id="volunteerAdd">
</form> 

