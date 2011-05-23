<script type="text/javascript">
$(document).ready(function() {
	function checkthatbox() {
	    $(':checkbox', this).trigger('click');
	    }
    $('#grid tr').click(checkthatbox());
  });
</script>
<!--  <input type='hidden' id='gridAdded' value="0" /><br> -->
<table border="0" id="grid" width="80%" cellspacing="3" cellpadding="2">
  <tr align="left">
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