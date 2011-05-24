<script type="text/javascript">
function updateGrid (ids) {
		$('#grid tr:gt(0)').remove();
		$.ajax({
			type: "GET",
			cache: false,
			url: 'Controller/search.php',
			data: "ids=" + ids ,
			success: function(data, textStatus) {
				$('#grid tr:last').after(data);
			}
		});
	}
	</script>



<script type="text/javascript">

var tooMany = 'For mange brugere valgt';
var tooFew =  'Ingen brugere valgt';

function getChecks() {
	var ids = new Array();
	
	$("input:checkbox[name=user_id]:checked").each(function() {ids.push($(this).val());});

	return ids;
}

function howManyChecks(ids) {
	var hmc = 'none'
	if (ids.length == 1) {
		hmc = 'one'
	} else if (ids.length > 1) {
		hmc = 'many'
	}

	return hmc;
}
</script>
