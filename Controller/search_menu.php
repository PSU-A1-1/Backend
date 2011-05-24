<script type="text/javascript">


$().ready(function() {

	var base_url = './?view=';
	
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
					  if ($("#searchID").val() != "") 
						{
				    	document.location.href = base_url + "workgroup";
				    	
						}
				  }
			});	
		$('#searchName').val("");
		$('#searchName').focus();
	});
	

	$("#showAll").click(function() {
    	document.location.href = base_url + "showall";
   
		
	});

	$("#workgroup").click(function() {
    	document.location.href = base_url + "workgroup";
   
		
	});
	
	$("#searchName").keypress(function(event){
		  if(event.keyCode == 13){
		    $("#searchAdd").click();
		    return false;
		  }
	});
});

</script>
