<!--  <input type='hidden' id='gridAdded' value="0" /><br> -->

<script type="text/javascript">

//Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}


$().ready(function() {
	$('#grid tr:gt(0)').remove();
	var view = getUrlVars()['view'];
	$.ajax({
		type: "GET",
		cache: false,
		url: 'Controller/rendergrid.php',
		data: view,
		success: function(data, textStatus) {
			$('#grid tr:last').after(data);
		}
	});

	
});

		
		
	
	</script>
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