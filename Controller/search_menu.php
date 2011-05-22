<script type="text/javascript">
//søger efter id i streng af kommaseparerede id'er

function IDAdded(id, addedIDs)
{
	if (addedIDs.search(id+', ') != -1)
		return true
	else 
		return false
}

$().ready(function() {
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
			$.ajax({
				  type: "GET",
				  cache: false,
				  url: 'Controller/search.php',
				  data: "id=" + $("#searchID").val() ,
				  success: function(data, textStatus) {
					  if ($('#showAllSet').val() == 1) {
						  $('#grid tr:gt(0)').remove();
						  $('#showAllSet').val(0);
					  }
					  $('#grid tr:last').after(data);
				  }
			});	
		$('#searchName').val("");
		$('#searchName').focus();
	});

	$("#showAll").click(function() {
		renderGrid("showall");
		
	
	$("#searchName").keypress(function(event){
		  if(event.keyCode == 13){
		    $("#searchAdd").click();
		    return false;
		  }
	});
	//$("#showAll").click();	// I think this is a bit buggy. Maybe, if isset : someview.....
});

</script>
