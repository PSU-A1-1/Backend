<input type='hidden' id='gridAdded' value="0" /><br>
<table border="1" id="grid" width="80%">
  <tr>
    <th width="40%">Navn</th>
    <th width="20%">ID</th>
    <th width="100">Øl</th>
    <th width="100">Drinks</th>
    <?php if($_SESSION['Admin']) { ?>
    <th width="10%">Aktiv</th>
    <?php } ?>
    <th width="10%">&nbsp;</th>
  </tr>
</table>

 <br><br>
ids added: <?php foreach($_SESSION['idsAdded'] as $id) { echo $id+" "; } ?><br>

<br>
<?php var_dump($_SESSION['idsChanged']); ?>