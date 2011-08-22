<script type="text/javascript">


$().ready(function() {

	var base_url = './?view=';
	var submit = false;
	$('#searchName').val("");
	$('#searchName').focus();

	function a_onClick() {
		   alert('a_onClick');
		  }
			
	
	$("#searchName").autocomplete("Model/ModelSearch.php", {
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
        $('#searchName').focus();
    });
    
	$("#searchAdd").click(function() {
		
			$.ajax({
				  type: "GET",
				  cache: false,
				  url: 'Model/ModelSearch.php',
				  data: "id=" + $("#searchID").val() ,
				  success: function(data, textStatus) {
					  if ($("#searchID").val() != "") 
						{ document.location.href = base_url + "workgroup"; }
				  }
			});	
	});
	

	$("#showAll").click(function() {
    	document.location.href = base_url + "showall";
	});

	$("#workgroup").click(function() {
    	document.location.href = base_url + "workgroup";
	});
	
	$("#searchName").keypress(function(event){
		  if(event.keyCode == 13 && submit){
		    $("#searchAdd").click();
		    return false;
		  } else if (event.keyCode == 13 && !submit) {
			  $('#searchName').focus();
			  submit = true;
			  return false;
		  }
	});

	$("#logout").click(function() {
		$.ajax({
			type: "POST",
			url: "Model/ModelLogin.php",
			data: "userAction=logout",
			dataType: "text",
			success: function (data) {
				// TODO : Better dialog box. ie. yes / no
			    var base_url = './?view=';
			    document.location.href = base_url + "login";

			   
			  },
			error: function(request, error){
			    alert(error);
			  }
			});
    	
	});
});

</script>
