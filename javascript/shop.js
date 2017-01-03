$(document).ready(function() {
	
	//Disabled a button
	$("#btnAgreeRoommate").prop("disabled",true);
	
	//Email Validator
	function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
	
	
	//Login on shop
    $('#submitRes').on('click', function () {
		type = "?residental";
		$("#shopModalMain").modal("show");
	});
	$('#submitCom').on('click', function () {

		type = "?commerical"
		$("#shopModalMain").modal("show");
	});
	
	//Louin system
	$('#shopLogin').on('click', function () {
		$.post('../assets/system/login.php',{username: $("#shopUsernameLogin").val(), password: $("#shopPassLogin").val()}, function(data){
		if (data == "confirm") {
		    $("#ohsnap").html("");
		    ohSnap('This acount needs to be confirmed!', 'blue');

		}
		if (data == "edit") {
 		    $("#ohsnap").html("");
		    ohSnap('Sign In Successful!', 'green');
		    setTimeout(function(){ window.location.reload(); }, 1500);



		}
		if (data == "home") {

			$("#ohsnap").html("");
				ohSnap('Sign In Succesful!', 'green');
		   setTimeout(function(){ window.location.reload();  }, 1500);


		}
		if (data == "invaild") {
		   $("#ohsnap").html("");	
		   ohSnap('<li class="fa fa-exclamation-triangle fa-3"></li>   Invaild Passsword or Username!', 'red');		

		}			

	   });
	});
	
	//Roommate Email System
	$('#roommateEmail').on('input',function(e){
        $('#roommateEmail').val($('#roommateEmail').val().replace(/ /g,""));
        if( !isValidEmailAddress($('#roommateEmail').val())) 
		{
			$("#roommateEmailDiv").removeClass("has-success");
			$("#roommateEmailDiv").addClass('has-error'); 

			$("#roommateEmailIcon").removeClass("glyphicon-ok");
			$("#roommateEmailIcon").addClass('glyphicon-remove'); 
            $("#btnAgreeRoommate").prop("disabled",true);

						
		}
		else
		{
								
			$("#roommateEmailDiv").addClass("has-success");
			$("#roommateEmailDiv").removeClass('has-error');
						
			$("#roommateEmailIcon").addClass("glyphicon-ok");
			$("#roommateEmailIcon").removeClass('glyphicon-remove'); 
			$("#btnAgreeRoommate").prop("disabled",false);
		} 
						

    });
	$('#btnAgreeRoommate').on('click', function () {
		$("#email").val($("#roommateEmail").val());
		setTimeout(function(){ $("#emailForm").submit(); }, 1500);
	});

 });

