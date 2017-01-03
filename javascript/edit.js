$(document).ready(function(){

    $("#editTabs a").click(function(e){

        e.preventDefault();

        $(this).tab('show');

    });
    $("#staffTabs a").click(function(e){

        e.preventDefault();

        $(this).tab('show');

    });

});