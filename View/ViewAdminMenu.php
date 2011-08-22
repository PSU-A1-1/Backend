<!-- Include controller -->
<?php include_once "Controller/ControllerAdminMenu.php";?>


<!-- View for the administrator menu -->

<div id="stylized" class="rightmenu"
	style="width: 150px; background: none;">
	<form id="form" name="form" method="post">
		<h2>Admin</h2>
		<p>So, what to do?</p>
		<a id="newVolunteer" href="#" target="_self"
			style="margin: 0; width: 117px; margin-top: 1px;">Tilføj frivillig</a>
		<a id="editVolunteer" href="#" target="_self"
			style="margin: 0; width: 117px; margin-top: 1px;">Rediger frivillig</a>
		<a id="activateVolunteer" href="#" target="_self"
			style="margin: 0; width: 117px; margin-top: 1px;">Skift status</a> <a
			id="statistics" href="#" target="_self"
			style="margin: 0; width: 117px; margin-top: 1px;">Statistik</a>
		<div class="spacer"></div>

	</form>
</div>
