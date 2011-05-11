<script type="text/javascript">
//søger efter id i streng af kommaseparerede id'er
function IDAdded( id, addedIDs )
{
	if (addedIDs.search(id+', ') != -1)
		return true
	else 
		return false
}

$().ready(function() {
	$('#gridAdded').val("0");
	$("#searchName").autocomplete("Controller/search.php", {
		width: 260,
		multiple: false,
		selectFirst: false,
		delay: 100,
		formatItem:function(item){
	        return item[0].split(',')[1];
	    },
	    formatResult:function(item){
		    return item[0].split(',')[1];
		}
	}).result(function(event,item){
        $("#searchID").val(item[0].split(',')[0]);
        $('#searchAdd').focus();
    });
    
	$("#searchAdd").click(function() {
		if (!IDAdded($("#searchID").val(), $('#gridAdded').val())) {
			$.ajax({
				  type: "GET",
				  cache: false,
				  url: 'Controller/search.php',
				  data: "id=" + $("#searchID").val() ,
				  success: function(data, textStatus) {
					  if ($('#gridAdded').val() == 0) {
						  $('#grid tr:gt(0)').remove();
					  }
					  $('#grid tr:last').after(data);
					  $('#gridAdded').val($('#gridAdded').val() + ', ' + $("#searchID").val());
				  }
			});
		}	
		$('#searchName').val("");
		$('#searchName').focus();
	});

	$("#showAll").click(function() {
			$.ajax({
				  type: "GET",
				  cache: false,
				  url: 'Controller/search.php',
				  data: "showall=1",
				  success: function(data, textStatus) {
					  $('#grid tr:last').after(data);  
				  }
			});	
	});
	
	$("#searchName").keypress(function(event){
		  if(event.keyCode == 13){
		    $("#searchAdd").click();
		    return false;
		  }
	});
	$("#showAll").click();
});

</script>

<form action="" method="post" >
Søg<br> 
<input type="text" name="name" id="searchName" /> <input type='hidden' id='searchID' />
<input type="button" value="Tilføj" id="searchAdd"> <input type="button" value="Vis alle" id="showAll">
</form> 
