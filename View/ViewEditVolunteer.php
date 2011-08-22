<?php include_once "Controller/ControllerEditVolunteer.php";?>

<div id="stylized" class="myform">
<form id="form" name="form" method="post">
<h1>Opdater frivillig</h1>
<p>Her opdateres frivilliges stamdata</p>

<label>Fornavn
<span class="small">Frivilligs fornavn</span>
</label>
<input id="volunteerName" type="text" value="" name="name"/>

<label>Efternavn
<span class="small">Frivilligs efternavn</span>
</label>
<input id="volunteerSurName" type="text" value="" name="email"/>

<label>ID
<span class="small">Nuværende ID</span>
</label>
<input id="id" maxlength="5" type="text" value=""  name="password" />

<label>Nyt ID
<span class="small">Tildel nyt ID</span>
</label>
<a href="#" id="newID"  style="clear:none; margin:2px 0 20px 10px;">=></a>
<div class="spacer"></div>
<label>Aktiv
<span class="small">Aktiver eller deaktiver frivillig</span>
</label>
<input type="checkbox" checked="checked" style="width:auto;"/> 
<div class="spacer"></div>
<a href="#" id="volunteerEdit">Opdater</a>
<div class="spacer"></div>

</form>
</div>



