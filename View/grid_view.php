<input type='hidden' id='gridAdded' value="0" /><br>
<table border="1" id="grid" width="80%">
  <tr>
    <th width="40%">Navn</th>
    <th width="20%">ID</th>
    <th width="10%">Øl</th>
    <th width="10%">Drinks</th>
    <?php if($_SESSION['Admin']) { ?>
    <th width="10%">Aktiv</th>
    <?php } ?>
    <th width="10%">&nbsp;</th>
  </tr>
</table>

 <br><br>
ids added: <?php foreach($_SESSION['idsAdded'] as $id) { echo $id+" "; } ?>
<br>
ids added: <?php $hej = array(1, 43, 32, 23);
foreach($hej as $id) { echo $id+" "; }
echo "<br>ny<br>";
foreach($hej as $key => $id) { unset($hej[$key]); }
//unset($_SESSION['idsAdded']); $_SESSION['idsAdded'];
foreach($hej as $id) { echo $id+" "; } ?>