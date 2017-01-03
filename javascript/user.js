$( document ).ready(function() {
	var getDone = false;
	function  getSettings() {
		$.post('../assets/system/getSettings.php',{}, function(data){
			var array = data.split(":");
			if (array[0] == "invaild") {
				$("#ohsnap").html("");
				ohSnap('The session has ended, pleas reload the page.','red');
						
			}
			else
			{
				if (array[0] == "enabled") {
						$("#emailEnabled").html("On");
						
				}
				else
				{
					$("#emailDisabled").html("Off");
				}
			}
	
		});
	}	
		
		
		
		
		
		
		
		
		
		
	// On click of Settings in Accounts...
	$("#settings").click(function() {
		$('#userSettings').modal('show');
		
		
		
	
	});
});


