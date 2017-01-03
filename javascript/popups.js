$(document).ready(function() { 

    //REGISTER

    var reg = false;

    function register() {

    	$("#mainRegData").html('<img src="../media/loading.gif" alt="Loading" title="Checking Server..."> Registration in progress...');

        $.post('../assets/system/register.php',{username: $("#rusername").val(), email: $("#remail").val(),pass: $("#rpass").val()}, function(data){

                alert(array)

                var array = data.split(":");

                if (array[0] == "failed") {

                    $("#mainRegData").html('<font color="orange" style="text-align: center;"  class="lAligned">ERROR :(</font>');

                }

                if (array[0] == "taken") {

                    $("#mainRegData").html('<font color="red" style="text-align: center;"  class="lAligned">Username Invaild</font>');

                }

                if (array[0] == "empty") {

                    $("#mainRegData").html('<font color="blue" style="text-align: center;" class="lAligned">Empty Username!</font>');

				}

                if (array[0] == "accepted") {

                	$('#mainRegister').dialog('close');

                    $('#emailConfirm').dialog('open');

                    $("#btnRegister").button("disable");

                    $("#emailAccount").html('Please check your email, <br/><h1>' + array[1]  + '</h1>');

                    $("#emailLink").html('<a href="#" id="email">Resend Email</a>');

                    $("#userSpan").html('<font color="white" style="font-weight: bold;">X</font>');

                    $("#emailSpan").html('<font color="white" style="font-weight: bold;">X</font>');

                    $("#passSpan").html('<font color="white" style="font-weight: bold;">X</font>');

                    $("#cpassSpan").html('<font color="white" style="font-weight: bold;">X</font>');

                    $("#rusername").val("")

                    $("#remail").val("")

                    $("#rpass").val("")

                    reg = true;

                }

        });

    	

    }

    $.ui.dialog.prototype._focusTabbable = $.noop;

	$( "#mainRegister" ).dialog({

      autoOpen: false,

      draggable: false,

      resizable: false,

	  modal: true,

      zIndex: 10000,
      
      width: 600,

      open: function() {

            // On open, hide the original submit button

            $( this ).find( "[type=submit]" ).hide();

        },

        buttons: [

            {

                id : "btnRegister",

                text: "Register",

                click: function() {

                    register();

                },

                type: "submit",

                form: "regForm" // <-- Make the association

            },

            {

                text: "Close",

                click: function() {

                    $( this ).dialog( "close" );

                }

            }

        ]

        

        

    }); 

    $( "#mainLogin" ).dialog({

      autoOpen: false,

      draggable: false,

      resizable: false,

	  modal: true,

      open: function() {

            // On open, hide the original submit button

            $( this ).find( "[type=submit]" ).hide();

        },

        buttons: [

            {

                id : "btnLogin",

                text: "Login",

                click: $.noop,

                type: "submit",

                form: "loginForm" // <-- Make the association

            },

            {

                text: "Close",

                click: function() {

                    $( this ).dialog( "close" );

                }

            }

        ]

    });

    $( "#emailConfirm" ).dialog({

      autoOpen: false,

      draggable: false,

      resizable: false,

	  modal: true,

      width: 600,

      open: function() {

            // On open, hide the original submit button

            $( this ).find( "[type=submit]" ).hide();

        },

        buttons: [

            {

                text: "Close",

                click: function() {

                   $( this ).dialog( "close" );

                }

            }

        ]

        

        

    }); 

     $( "#login" ).click(function() {

      $( "#mainLogin" ).dialog( "open" );

    });

   $( "#register" ).click(function() {
	$("myRegister").modal("show");

    });

  });