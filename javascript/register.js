$(document).ready(function() {
	$("#btnRegister").prop("disabled",true);
    $("#captcha").hide();
    $("#mainRegData").hide();
    $("#mainPanelConfirm").hide();
    var sameVal;
	var mail;
	var varFake;
    var user;
    function captchaGet(check) {
        $("#captcha").show();
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            if (check) {
                $("#captcha").html("You can't leave Captcha Code empty");
                $("#captcha").addClass("label-danger");
                $("#captcha").removeClass('label-success'); 
                return false; 
            }
        }
        if(v.length != 0)
        {
            $("#captcha").html("Thanks for completing the Captcha Code!");
            $("#captcha").removeClass('label-danger'); 
            $("#captcha").addClass("label-success");
            return true; 
        }
    }
   function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
    function userCheck() {
        var myLength = $("#inputUsername").val().length;
        if (myLength > 4) {        
            $.post('../assets/system/username.php',{username: $("#inputUsername").val()}, function(data){
                if(data == 'false'){
                   $("#divUsername").addClass("has-error");
                   $("#divUsername").removeClass('has-success'); 
                   
                   $("#iconUsername").addClass("glyphicon-remove");
                   $("#iconUsername").removeClass('glyphicon-ok'); 
				  // $("#btnRegister").addClass('disabled'); //disabled
				   $("#btnRegister").prop("disabled",true);
                }else{
                    $("#divUsername").addClass("has-success");
                    $("#divUsername").removeClass('has-error'); 
                    
                    $("#iconUsername").addClass("glyphicon-ok");
                    $("#iconUsername").removeClass('glyphicon-remove'); 
					if (sameVal == 1) {
						if( !isValidEmailAddress($('#inputEmail').val())) { 
							// $("#btnRegister").addClass('disabled'); //disabled
                            if (!captchaGet(true)) {
                                $("#btnRegister").prop("disabled",true);
                            } 
                            else
                            {
                                $("#btnRegister").prop("disabled",true);
                            }
                            
						}
						else
						{
                            if (!captchaGet()) {
                                $("#btnRegister").prop("disabled",true); //ENABLED
                            } 
                            else
                            {
                                $("#btnRegister").prop("disabled",false); //ENABLED
                            }
					
						}
					}
                }
            });
        }
        else 
        {
            $("#divUsername").removeClass('has-error');
            $("#divUsername").removeClass('has-success');

            $("#iconUsername").removeClass('glyphicon-ok'); 
            $("#iconUsername").removeClass('glyphicon-remove'); 
	    $("#btnRegister").prop("disabled",true);
        }
    }
    function checkPassword() {       
            if ($("#inputPass").val() == $("#inputConfirmPass").val()){
                $("#divConfirmPass").removeClass('has-error');
                $("#divConfirmPass").addClass('has-success');

                $("#iconConfirmPass").addClass('glyphicon-ok'); 
                $("#iconConfirmPass").removeClass('glyphicon-remove');  
				userCheck();
				sameVal = 1;
				
            
            }
            else
            {
                $("#divConfirmPass").addClass('has-error');
                $("#divConfirmPass").removeClass('has-success');

                $("#iconConfirmPass").removeClass('glyphicon-ok'); 
                $("#iconConfirmPass").addClass('glyphicon-remove'); 
				
				$("#btnRegister").prop("disabled",true);
				sameVal = 0;
           
            }
    }
    function confirmEmail(username){
        $.post('../assets/system/email.php',{username: username}, function(data){
           alert(data); 

	if (data == "failed") {
                alert("Error has happened! We don't know why! Reload Page!");
            }
            else{
                $("#btnResend").prop("disabled",true);
                setTimeout(function(){ $("#btnResend").prop("disabled",false); }, 300000);
		$("#btnResend").addClass("btn-info");
            }
        });
    
    }
    $('#inputUsername').on('input',function(e){

        $('#inputUsername').val($('#inputUsername').val().replace(/ /g,""));

        userCheck();

    });
     $('#inputEmail').on('input',function(e){
        $('#inputEmail').val($('#inputEmail').val().replace(/ /g,""));
        if( !isValidEmailAddress($('#inputEmail').val())) { 
            $("#divEmail").addClass('has-error');
            $("#divEmail").removeClass('has-success');

            $("#iconEmail").removeClass('glyphicon-ok'); 
            $("#iconEmail").addClass('glyphicon-remove'); 
			mail = 0
			userCheck()


        } 
        else
        {
        
            $("#divEmail").removeClass('has-error');
            $("#divEmail").addClass('has-success');

            $("#iconEmail").addClass('glyphicon-ok'); 
            $("#iconEmail").removeClass('glyphicon-remove'); 
			mail = 1
			userCheck()
        
        }
    });
    //
    $('#inputPass').on('input',function(e){
        var myLength = $("#inputPass").val().length;
        if (myLength > 5) {
            checkPassword();-
			$("#divPass").removeClass('has-error');
            $("#divPass").addClass('has-success');

            $("#iconPass").addClass('glyphicon-ok'); 
            $("#iconPass").removeClass('glyphicon-remove'); 
        }
		else
		{
			$("#divPass").addClass('has-error');
            $("#divPass").removeClass('has-success');

            $("#iconPass").removeClass('glyphicon-ok'); 
            $("#iconPass").addClass('glyphicon-remove'); 
			
		}
         
    
    });
	$('#inputConfirmPass').on('input',function(e){
		checkPassword()
	});
    //CHECK IF USERNAME HAS NO CHARACHTERS AND IF SO....
	window.setInterval(function(){
        captchaGet(false);
		var userLength = $("#inputUsername").val().length;
        if (userLength > 4) {  
			//
			varFake = 0;
		}
        else 
        {
            $("#divUsername").removeClass('has-error');
            $("#divUsername").removeClass('has-success');

            $("#iconUsername").removeClass('glyphicon-ok'); 
            $("#iconUsername").removeClass('glyphicon-remove'); 
			$("#btnRegister").prop("disabled",true);
        }	
		var passLength = $("#inputPass").val().length;
		if (passLength > 5) {  
			checkPassword();
		}
        else 
        {
            $("#divConfirmPass").removeClass('has-error');
            $("#divConfirmPass").removeClass('has-success');

            $("#iconConfirmPass").removeClass('glyphicon-ok'); 
            $("#iconConfirmPass").removeClass('glyphicon-remove'); 
        }	
	}, 1000);
    
    
    
    $('#btnRegister').on('click', function () {
        var username = $("#inputUsername").val();
        var email = $("#inputEmail").val();
        var password = $("#inputPass").val();
        var response = grecaptcha.getResponse();
	var first = $("#inputFirstName").val();
	var last = $("#inputLastName").val();
        $.post('../assets/system/register.php',{username: username, email: email, pass: password, firstn: first, lastn: last}, function(data){

                var array = data.split(":");
                if (array[0] == "failed") {

                    $("#mainRegData").html('<h4><span class="label label-danger">We have failed! Sorry...</span></h4>');

                } 
                if (array[0] == "taken") {

                    $("#mainRegData").html('<h4><span class="label label-info">Username is taken! Try Again!</span></h4>');

                }

                if (array[0] == "empty") {

                    $("#mainRegData").html('<h4><span class="label label-warning">Empty Username! Error???</span></h4>');

				}
				if (array[0] == "disabled") {

                    $("#ohsnap").html("");
					ohSnap('<li class="fa fa-exclamation-triangle fa-3"></li>   Registartion is disable right now!', 'red');

				}
                if (array[0] == "accepted") {
                    user = username;
                    $("#mainPanelRegister").hide();
                    $("#mainPanelConfirm").show();
                    $("#emailAddress").html('<h4>' + array[1] +' </h4>');
                    confirmEmail(user);
                    setTimeout(function(){ $("#btnResend").prop("disabled",false); }, 1000);
                }
        });
        });
    $('#btnResend').on('click', function () {
        confirmEmail(user);
    });
});
