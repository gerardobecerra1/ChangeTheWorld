$(document).ready(function(){
    $( "#text-course" ).hide();
    $( "#navbar-nav-course" ).hide();

    /* navbar */
    $(window).on("scroll",function(){
        if($(this).scrollTop()>90){
            $(".navbar").addClass("navbar-shrink");
        }
        else{
            $(".navbar").removeClass("navbar-shrink");
        }
    });

    $(window).on("scroll",function(){
        /* title-course */
        if($(this).scrollTop()>420){
            $( "#text-course" ).show( "slow", function() {});
            $( "#navbar-nav-course" ).show();
            $( "#img-logo" ).hide( "slow", function() {});
            $( "#navbar-nav" ).hide( "fast", function() {});
        }
        else if($(this).scrollTop()<420){
            $( "#text-course" ).hide( "slow", function() {});
            $( "#navbar-nav-course" ).hide();
            $( "#img-logo" ).show( "slow", function() {});
            $( "#navbar-nav" ).show( "slow", function() {}); 
        }
    });

    /* contact scroll */
    $.scrollIt({
        topOffset: -50
    });

});