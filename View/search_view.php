<script type="text/javascript">
//s�ger efter id i streng af kommaseparerede id'er
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
					  var rowCount = $('#grid tr').length;
					  if ($('#grid tr').length % 2 == 1) {
						  $("#grid tr:last").addClass("gridOdd");
					  }
				  }
			});	
		$('#searchName').val("");
		$('#searchName').focus();
	});
	var tog = false;
	$("#showAll").click(function() {
		$('#grid tr:gt(0)').remove();
			$.ajax({
				  type: "GET",
				  cache: false,
				  url: 'Controller/search.php',
				  data: "showall=1",
				  success: function(data, textStatus) {
					  $('#grid tr:last').after(data); 
					  $('#grid tr').click(function() {
						$('input[name=user_id]', this).attr("checked",!tog);
					  	tog = !tog; 
					  	if(tog) {$(this).addClass("gridOver"); } else {$(this).removeClass("gridOver");} });
				  }
			});	
		$('#showAllSet').val(1);
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
S�g<br> 
<input type="text" name="name" id="searchName" class="input"/> <input type='hidden' id='searchID' /> <input type='hidden' id='showAllSet' />
<input type="button" value="Tilf�j" id="searchAdd"> <input type="button" value="Vis alle" id="showAll">
</form> 
