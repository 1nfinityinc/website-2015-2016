$(document).ready(function() {
	$('#shopLogin').on('click', function () {
		$.post('../assets/system/sendemail.php',{email: $("#forgotEmail").val()}, function(data){
		if (data == "error") {
		    $("#ohsnap").html("");
		    ohSnap('<h1>Invaild Email!</h1>', 'blue');

		}
		if (data == "sent") {
 		    $("#ohsnap").html("");
		    ohSnap('Email has been sent', 'green');
		    $("#resetPassDiv").html("<h1>Please check your email to reset pass</h1>");
	   });
	});
 });

