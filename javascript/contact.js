$(document).ready(function() {
	$("#btnContact").prop("disabled",true);
    $("#contactInputText").prop("disabled",true);
   
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };
   function contactCheck() {
        var name = $("#contactInputName").val().length;
		if (name >= 1) {
			$("#contactName").removeClass("has-error");
            $("#contactName").addClass('has-success'); 
                   
			$("#contactIconName").removeClass("glyphicon-remove");
			$("#contactIconName").addClass('glyphicon-ok'); 
			if(!isValidEmailAddress($('#contactInputEmail').val())) { 
               $("#contactInputText").prop("disabled",true);
			   
			    $("#contactEmail").addClass("has-error");
                $("#contactEmail").removeClass('has-success'); 
                   
                $("#iconEmail").addClass("glyphicon-remove");
                $("#iconEmail").removeClass('glyphicon-ok'); 
            } 
            else
            {
				$("#contactInputText").prop("disabled",false);   			   
			    $("#contactEmail").removeClass("has-error");
                $("#contactEmail").addClass('has-success'); 
                   
                $("#iconEmail").removeClass("glyphicon-remove");
                $("#iconEmail").addClass('glyphicon-ok'); 
            }
        }
        else 
        {
			$("#btnRegister").prop("disabled",true);
		
			$("#contactName").removeClass("has-error");
			$("#contactName").removeClass('has-success'); 
					   
			$("#contactIconName").removeClass("glyphicon-remove");
			$("#contactIconName").removeClass('glyphicon-ok'); 
        }
    }
    $('#contactInputEmail').on('input',function(e){
        contactCheck();
    });
     $('#contactInputName').on('input',function(e){
		contactCheck()
    });
    //
    $('#contactInputText').on('change keyup paste',function(e){
        var limit = $("#contactInputText").val().length;
		if (limit >= 1) {
				$("#btnContact").prop("disabled",false);
			$("#contactLimit").html("Characters: " + limit + "/500");
		}
    });
	window.setInterval(function(){
        contactCheck();
	}, 1000);
    
    $('#btnContact').on('click', function () {
        var name = $("#contactInputName").val();
        var email = $("#contactInputEmail").val();
        var text = $("#contactInputText").val();
		var department = $("#contactManage").val();
        $.post('../assets/system/contact.php',{name: name, email: email, department: department, text: text}, function(data){
                if (data == "error") {

                    $("#contactError").html('<h4><span class="label label-danger">We have failed! Sorry...' + data + ' </span></h4>');

                } 
                if (data == "sent") {

                    $('#contactModal').modal()     

                }
		});
	});
});
