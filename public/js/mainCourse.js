$(document).ready(function () {
    $("#text-course").hide();
    $("#navbar-nav-course").hide();

    /* navbar */
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 90) {
            $(".navbar").addClass("navbar-shrink");
        } else {
            $(".navbar").removeClass("navbar-shrink");
        }
    });

    $(window).on("scroll", function () {
        /* title-course */
        if ($(this).scrollTop() > 420) {
            $("#text-course").show("slow", function () {});
            $("#navbar-nav-course").show();
            $("#img-logo").hide("slow", function () {});
            $("#navbar-nav").hide("fast", function () {});
        } else if ($(this).scrollTop() < 420) {
            $("#text-course").hide("slow", function () {});
            $("#navbar-nav-course").hide();
            $("#img-logo").show("slow", function () {});
            $("#navbar-nav").show("slow", function () {});
        }
    });

    /* contact scroll */
    $.scrollIt({
        topOffset: -50
    });

    $('.form-comments').submit(function (e) { 
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "http://localhost/CTW/curso/agregarCR",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                Swal.fire({
                    title: 'Please wait',
                    html: 'We are uploading your video',
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
            },
            success: function (response) {
                console.log(response);
                if (response >= 0) {
                    console.log(response);
                    $(".media").empty()
                    $(".media").html('<img src="http://localhost/CTW/public/img/avatar_opt.jpg" width="74" height="74" alt=""><div class="media-body"><p class="name">'+$("#nombre").val()+'</p><p class="user-comment">'+$("#comentFinal").val()+'</p></div>')
                    $("#rating").val('')
                    $("#comentFinal").val('')
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your comment and rating have been sent!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    })

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Your comment and rating cannot be submitted',
                        icon: 'error',
                        confirmButtonText: 'Retry'
                    })
                }
            }
        });
    });

});