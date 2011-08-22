<script type="text/javascript">

//Read a page's GET URL variables and return them as an associative array. Stolen from somewhere.
$.extend({
	  getUrlVars: function(){
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	      hash = hashes[i].split('=');
	      vars.push(hash[0]);
	      vars[hash[0]] = hash[1];
	    }
	    return vars;
	  },
	  getUrlVar: function(name){
	    return $.getUrlVars()[name];
	  }
	});


$().ready(function() {

	$('#grid tr:gt(0)').remove();
	var view = $.getUrlVars()['view'];
	$.ajax({
		type: "GET",
		cache: false,
		url: 'Model/ModelGrid.php',
		data: 'view=' + view,
		success: function(data, textStatus) {

			$('#grid > tbody').append(data);
  
		
			$('#grid').dataTable( {
				"iDisplayLength": 10,
				"sPaginationType": "full_numbers",
				"bFilter": false
			} );
		}
	});
});

		
</script>
