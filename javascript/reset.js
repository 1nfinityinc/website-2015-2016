$(document).ready(function() {
	$("#btnReset").prop("disabled",true);

    
	function passCheck() {
	  if ($("#inputPassFirst").val() == $("#inputPassSecond").val()){
 
			if ($("#inputPassFirst").val() > 6) {  
			
				$("#divPassSecond").removeClass('has-error');
				$("#divPassSecond").addClass('has-success');

				$("#divPassSecond").addClass('glyphicon-ok'); 
				$("#divPassSecond").removeClass('glyphicon-remove'); 
				$("#btnReset").prop("disabled",true);
				alert("Yes");
			}
			else {
				$("#divPassSecond").addClass('has-error');
				$("#divPassSecond").removeClass('has-success');

				$("#iconPassSecond").removeClass('glyphicon-ok'); 
				$("#iconPassSecond").addClass('glyphicon-remove'); 
				
			}
        }
        else
        {
            $("#divPassSecond").addClass('has-error');
            $("#divPassSecond").removeClass('has-success');

            $("#iconPassSecond").removeClass('glyphicon-ok'); 
            $("#iconPassSecond").addClass('glyphicon-remove'); 
				
			$("#btnReset").prop("disabled",true);
           
            }
		
		
	}
	
    $('#inputPassFirst').on('input',function(e){

        passCheck();

    });
	$('#inputPassSecond').on('input',function(e){

        passCheck();
		
    });
    //CHECK IF USERNAME HAS NO CHARACHTERS AND IF SO....
    window.setInterval(function(){
	var userLength = $("#inputPassFirst").val().length;
        if (userLength > 6) {  
			$("#divPassFirst").removeClass('has-error');
            $("#divPassFirst").addClass('has-success');

            $("#iconPassFirst").addClass('glyphicon-ok'); 
            $("#iconPassFirst").removeClass('glyphicon-remove'); 
			passCheck();
		}
        else 
        {
            $("#divPassFirst").removeClass('has-error');
            $("#divPassFirst").removeClass('has-success');

            $("#iconPassFirst").removeClass('glyphicon-ok'); 
            $("#iconPassFirst").removeClass('glyphicon-remove'); 
			$("#btnReset").prop("disabled",true);
		}
        
	}, 1000);

    
    $('#btnReset').on('click', function () {
        
    });
});

