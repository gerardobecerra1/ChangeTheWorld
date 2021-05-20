$(document).ready(function () {

    $(".sign-up-form").submit(function (e) {
        e.preventDefault();
        var _role = $("#sign_type").val();
        var _username = $("#sign_username").val();
        var _name = $("#sign_name").val();
        var _lastname = $("#sign_lastname").val();
        var _email = $("#sign_email").val();
        var _password = $("#sign_password").val();

        if (_name == "" || _username == "" || _email == "" || _password == "") {
            Swal.fire({
                title: 'Empty Requirements!',
                text: 'Enter all requeriments',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/CTW/Login/registrarUsuario",
                data: $(this).serialize(),
                success: function (response) {
                    if (response > 0) {
                        Swal.fire({
                            title: 'Welcome!',
                            text: 'Successful registration!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'The email is already registered',
                            icon: 'error',
                            confirmButtonText: 'Retry'
                        })
                    }
                }
            });
        }
    });

    // LOG IN
    $(".sign-in-form").submit(function (e) {
        e.preventDefault();
        var _select = $("#tipo-login").val()
        var _username = $("#log_username").val();
        var _password = $("#log_password").val();

        if (_username == "" || _password == "") {
            Swal.fire({
                title: 'Empty Requirements!',
                text: 'Enter username and password',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
        } else {
            $.ajax({
                type: "POST",
                url: "http://localhost/CTW/Login/inicioSesion",
                data: $(this).serialize(),
                success: function (response) {
                    if (response < 0) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'The role, password or email are not correct',
                            icon: 'error',
                            confirmButtonText: 'Retry'
                        })
                    }else{
                        if(_select == "Teacher"){
                            location.href = 'http://localhost/CTW/Dashboard';
                        }else{
                            location.href = 'http://localhost/CTW/Principal';
                        }
                    }
                }
            });
        }
    });


    // SING IN 
    // $("#btn_signin").click(function () {
    //     var _role = $("#sign_type").val();
    //     var _username = $("#sign_username").val();
    //     var _name = $("#sign_name").val();
    //     var _lastname = $("#sign_lastname").val();
    //     var _email = $("#sign_email").val();
    //     var _password = $("#sign_password").val();

    //     if (_name == "" || _username == "" || _email == "" || _password == "") {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             url: "http://localhost/CTW/Login/test",
    //             success: function () {
    //                 Swal.fire({
    //                     title: 'It´s ok!',
    //                     text: 'Welcome!',
    //                     icon: 'success',
    //                     confirmButtonText: 'Retry'
    //                 })
    //             }
    //         });
    //     }


    // });

    // TOLTLIP
    $(function () {
        $("#sign_password").tooltip();
    });

    //nombre
    $(function () {
        $("#sign_name").keyup(function () {
            //EXPRESIONES:
            var val = $("#sign_name").val();
            var numbers = new RegExp("^(?=.*[0-9])");

            if (numbers.test(val) || val.length == 0) {
                $("#border_name").removeClass("Correcto").addClass("incorrecto");
            } else {
                $("#border_name").removeClass("incorrecto").addClass("Correcto");
            }
        });
    });
    //CORREO
    $(function () {
        $("#sign_email").keyup(function () {
            //EXPRESIONES:
            var mail = new RegExp("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9_\-]+\.[a-zA-Z0-9\-\.]+$/");
            var correo = $("#sign_email").val();
            var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/

            if (reg.test(correo)) {
                $("#border_mail").removeClass("incorrecto").addClass("Correcto");
            } else {
                $("#border_mail").removeClass("Correcto").addClass("incorrecto");
            }
        });
    });

    //CONTRASEÑA
    $(function () {
        $("#sign_password").keyup(function () {

            //EXPRESIONES:
            var mayus = new RegExp("^(?=.*[A-Z])");
            var special = new RegExp("^(?=.*[!@#$%&_*])");
            var numbers = new RegExp("^(?=.*[0-9])");
            var lower = new RegExp("^(?=.*[a-z])");
            var len = new RegExp("^(?=.{8,})");
            var pass = $("#sign_password").val();

            if (mayus.test(pass) && lower.test(pass) &&
                special.test(pass) && numbers.test(pass) &&
                len.test(pass)) {
                $("#border_pass").removeClass("incorrecto").addClass("Correcto");

            } else {
                $("#border_pass").removeClass("Correcto").addClass("incorrecto");
            }
        });
    });
});


// let boton = document.querySelector('#id-submit')
// let combobots = document.querySelector('#tipo-signin')

// boton.addEventListener("click", e =>{
//     e.preventDefault()

//     console.log(combobots.value)
// })