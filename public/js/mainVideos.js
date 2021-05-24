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
            $( "#img-logo" ).hide( "slow", function() {});
        }
        else if($(this).scrollTop()<420){
            $( "#text-course" ).hide( "slow", function() {});
            $( "#img-logo" ).show( "slow", function() {}); 
        }
    });

     /* courses carousel */
     $('.courses-carousel').owlCarousel({
        loop:true,
        margin:0,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });
    
    /* contact scroll */
    $.scrollIt({
        topOffset: -80
    });
    
});