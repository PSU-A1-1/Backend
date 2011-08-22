<?php include_once "Controller/ControllerNewVolunteer.php";?>

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

<label>ID
<span class="small">ID</span>
</label>
<input id="volunteerId" maxlength="5" type="text" value=""  name="id" />


<div class="spacer"></div>
<label>Aktiv
<span class="small">Aktiver eller deaktiver frivillig</span>
</label>
<input type="checkbox" id="aktiv" checked="checked" style="width:auto;"/> 
<div class="spacer"></div>
<a href="#" id="volunteerAdd">Tilføj</a>
<div class="spacer"></div>

</form>
</div>




