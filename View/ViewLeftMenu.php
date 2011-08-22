<?php include_once "Controller/common_menu_func.php";?>
<?php include_once "Controller/MainMenu.php"; ?>




<div id="stylized" class="search" style="width:172px; margin-top:10px; ">
  <form id="form" name="form" method="post">
    <h2>View</h2>
    <p>Vis alle eller workgroup</p>
    <a href="#" id="showAll" target="_self" style="margin:0; width:58px; clear:none; float: left; margin-right:5px; margin-top:1px;">Vis alle</a> 
    <a href="#"  id="workgroup" target="_self" style="margin:0; width:auto; clear:none; float:left;  margin-top:1px;">Workgroup</a>
    <div class="spacer"></div>
    
  </form>
</div>



<div id="stylized" class="search" style="margin-top:25px">
  <form id="form" name="form" method="post">
    <h2>Søg</h2>
    <p>Søg efter frivillige</p>
    <input type="text" name="name" id="searchName" style="width:167px; margin:0;"/> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
    <div class="spacer"></div>
    <a href="#" id="searchAdd" style="margin:0; margin-top:10px;">Tilføj</a>
    <div class="spacer"></div>
    
  </form>
</div>


<div id="stylized" class="search" style="width:172px; margin-top:10px; ">
  <form id="form" name="form" method="post">
    <h2>Logout</h2>
    <p>Log ud af denne session</p>
    <a href="#" id="logout" target="_self" style="margin:0; width:58px; clear:none; float: left; margin-right:5px; margin-top:1px;">Logout</a> 
    <div class="spacer"></div>
    
  </form>
</div>

