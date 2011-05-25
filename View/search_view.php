<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/search_menu.php"; ?>


<br style="clear: left;" /> 
<br style="clear: left;" /> 
<div id="stylized" class="search">
<form id="form" name="form" method="post">
<h2>Søg</h2>
<p>Søg efter frivillige</p>
<input type="text" name="name" id="searchName" style="width:150px; margin:0;"/> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
<div class="spacer"></div>
<a href="#" id="searchAdd" style="margin:0; margin-top:10px;">Tilføj</a>
<div class="spacer"></div>

</form>
</div>
<div id="stylized" class="rightmenu" style="width:150px; background:none; ">
<a href="#" id="showAll" target="_self" style="margin:0; width:auto; clear:none; float: left; margin-right:4px; margin-top:1px;">Vis alle</a> 
<a href="#"  id="workgroup" target="_self" style="margin:0; width:auto; clear:none; float: left;  margin-top:1px;">Workgroup</a>

</div>


