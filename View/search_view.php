<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>




<div id="stylized" class="rightmenu" style="width:172px; margin-top:10px; ">
<form id="form" name="form" method="post">
<a href="#" id="showAll" target="_self" style="margin:0; width:58px; clear:none; float: left; margin-right:4px; margin-top:1px;">Vis alle</a> 
<a href="#"  id="workgroup" target="_self" style="margin:0; width:auto;  margin-top:1px;">Workgroup</a>
<div class="spacer"></div>

</form>
</div>


<br style="clear: left;" /> 
<div id="stylized" class="search" style="margin-top:35px">
<form id="form" name="form" method="post">
<h2>Søg</h2>
<p>Søg efter frivillige</p>
<input type="text" name="name" id="searchName" style="width:150px; margin:0;"/> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
<div class="spacer"></div>
<a href="#" id="searchAdd" style="margin:0; margin-top:10px;">Tilføj</a>
<div class="spacer"></div>

</form>
</div>


