<script type="text/javascript">
$().ready(
		function() 
		{

			$('#user').focus();
		});
</script>

<div id="stylized" class="myform">
<form id="form" name="form" method="post">
<h1>Login</h1>
<p>Login som admin eller afvikler</p>

<label>Brugernavn
<span class="small">Dit brugernavn</span>
</label>
<input id="user" type="text" value="" name="name"/>

<label>Password
<span class="small">Dit password</span>
</label>
<input id="pass" type="text" value="" name="email"/>

<a href="#" id="login">Login</a>
<div class="spacer"></div>

</form>
</div>
