$(document).ready(function() {
    $('.dropdown-menu').click(function(event){
     event.stopPropagation();
	});
	
	$('#btnLogin').on('click', function () {
		$.post('../assets/system/login.php',{username: $("#loginUsername").val(), password: $("#loginPassword").val()}, function(data){
		if (data == "confirm") {
		    $("#ohsnap").html("");
		    ohSnap('This acount needs to be confirmed!', 'blue');

		}
		if (data == "edit") {
 		    $("#ohsnap").html("");
		    ohSnap('Welcome Admin, going to edit system!', 'green');
		    setTimeout(function(){ window.location.href = "https://1nfinityinc.ml/edit"; }, 1500);



		}
		if (data == "home") {
		    $("#ohsnap").html("");
		    ohSnap('Sign In Succesful!', 'green');
		   setTimeout(function(){ window.location.href = "https://1nfinityinc.ml/home"; }, 1500);


		}
		if (data == "invaild") {
		   $("#ohsnap").html("");	
		   ohSnap('<li class="fa fa-exclamation-triangle fa-3"></li>   Invaild Passsword or Username!', 'red');		

		}			

	   });
	});

    $('#slogan').bind('wheel mousewheel', function(e){
        var delta;

        if (e.originalEvent.wheelDelta !== undefined)
            delta = e.originalEvent.wheelDelta;
        else
            delta = e.originalEvent.deltaY * -1;

            if(delta > 0) {
                $("#slogan").css("width", "+=10");
            }
            else{
                $("#slogan").css("width", "-=10");
            }
        });


});

