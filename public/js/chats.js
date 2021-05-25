$(document).ready(function () {

    $("#MyCourse").show();
    // $("#CreateCourse").hide();
    // $("#Statics").hide();
    $("#addVideos").hide();

    $("#btnAgregarCategoria").click(function (e) {
        const $select = $("#tipo-dash option");
        let $cate = $('#inputCategoria').val();
        if ($cate.length > 0) {
            Swal.fire({
                title: 'Do you want to add this new category?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Add`,
                denyButtonText: `Don't add`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#tipo-dash').append($('<option />', {
                        text: $cate,
                        value: $select.length + 1,
                    }));
                    httpRequest("http://localhost/CTW/Dashboard/AgregarCategoria/" + $cate, function () {
                        console.log(this.responseText);
                    });
                    $('#inputCategoria').val('');
                    Swal.fire('Successfully added!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not added', '', 'info')
                }
            });
        } else {
            Swal.fire({
                title: 'Empty field!',
                text: 'You must fill the field',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
        }
    });

    $(".agregar_video_introduction").submit(function (e) {
        e.preventDefault();

        if ($("#shortVideoTitle").val() != "") {

            $.ajax({
                type: "POST",
                url: "http://localhost/CTW/chat/insertar/" + $("#introductionIdCourse").val() + "/" + $("#introductionLevel").val() + "/" + $("#shortVideoTitle").val(),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $("#shortVideoTitle").val('');
                    if (response >= 0) {
                        $(".videos-agregados-intro").empty();
                        $.ajax({
                            type: "POST",
                            url: "http://localhost/CTW/chat/traerMensajes/" + $("#introductionIdCourse").val() + "/" + $("#introductionLevel").val(),
                            data: null,
                            success: function (response) {
                                if (response != "") {
                                    $(".videos-agregados-intro").html(response)
                                } else {
                                    $(".videos-agregados-intro").html(' <a> No hay mensajes</a>')
                                }
                            }
                        });
                        Swal.fire({
                            title: 'Success!',
                            text: 'Successfully send!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'The message could not be send',
                            icon: 'error',
                            confirmButtonText: 'Retry'
                        })
                    }
                }
            });
        } else {
            Swal.fire({
                title: 'Empty Requirements!',
                text: 'Enter all requeriments',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
        }
    });


    // if ($("#upload_image").val() != "" && $("#tipo-dash").val() != "" && $("#inputTitle").val() != "" && $("#ShortD").val() != "" && $("#inputPrice").val() != "" && $("#longD").val() != "") {
    //     Swal.fire({
    //         title: 'Do you want to add this new course?',
    //         showDenyButton: true,
    //         showCancelButton: true,
    //         confirmButtonText: `Add`,
    //         denyButtonText: `Don't add`,
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 type: "POST",
    //                 url: "http://localhost/CTW/Dashboard/registrarCurso",
    //                 data: new FormData(this),
    //                 contentType: false,
    //                 cache: false,
    //                 processData: false,
    //                 success: function (response) {
    //                     if (response >= 0) {
    //                         $("#Cursosapartado").empty();
    //                         $("#uploaded_image").attr("src", "http://localhost/CTW/public/img/sinFoto.png");
    //                         $("#upload_image").val('');
    //                         $("#tipo-dash").val('');
    //                         $("#inputTitle").val('');
    //                         $("#ShortD").val('');
    //                         $("#inputPrice").val('');
    //                         $("#longD").val('');
    //                         Swal.fire({
    //                             title: 'Success!',
    //                             text: 'Successfully added!',
    //                             icon: 'success',
    //                             confirmButtonText: 'OK'
    //                         })
    //                         $.ajax({
    //                             type: "POST",
    //                             url: "http://localhost/CTW/Dashboard/mostrarCursosAjax",
    //                             data: null,
    //                             success: function (response) {
    //                                 console.log(response);
    //                                 $("#Cursosapartado").html(response);
    //                             }
    //                         });
    //                     } else {
    //                         Swal.fire({
    //                             title: 'Error!',
    //                             text: 'The course could not be saved',
    //                             icon: 'error',
    //                             confirmButtonText: 'Retry'
    //                         })
    //                     }
    //                 }
    //             });
    //         } else if (result.isDenied) {
    //             Swal.fire('Course are not added', '', 'info')
    //         }
    //     });
    // } else {
    //     Swal.fire({
    //         title: 'Empty Requirements!',
    //         text: 'Enter all requeriments',
    //         icon: 'error',
    //         confirmButtonText: 'Retry'
    //     })
    // }


    // $(".agregar_video_introduction").submit(function (e) {
    //     e.preventDefault();
    //     if ($("#selectVideoIntro").val() != "" && $("#inputTitleVideoIntro").val() != "" && $("#shortVideoTitle").val() != "") {
    //         Swal.fire({
    //             title: 'Do you want to add this new video?',
    //             showDenyButton: true,
    //             showCancelButton: true,
    //             confirmButtonText: `Add`,
    //             denyButtonText: `Don't add`,
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: "http://localhost/CTW/Dashboard/AgregarVideoIntro",
    //                     data: new FormData(this),
    //                     contentType: false,
    //                     cache: false,
    //                     processData: false,
    //                     beforeSend: function () {
    //                         Swal.fire({
    //                             title: 'Please wait',
    //                             html: 'We are uploading your video',
    //                             didOpen: () => {
    //                                 Swal.showLoading()
    //                             },
    //                         })
    //                     },
    //                     success: function (response) {
    //                         console.log(response);
    //                         if (response >= 0) {
    //                             $(".videos-agregados-intro").empty()
    //                             $.ajax({
    //                                 type: "POST",
    //                                 url: "http://localhost/CTW/Dashboard/mostrarVideosAjax/" + $("#introductionIdCourse").val() + "/" + $("#introductionLevel").val(),
    //                                 data: null,
    //                                 success: function (response) {
    //                                     console.log(response);
    //                                     $(".videos-agregados-intro").html(response)
    //                                 }
    //                             });
    //                             $("#selectVideoIntro").val('')
    //                             $("#inputTitleVideoIntro").val('')
    //                             $("#shortVideoTitle").val('')
    //                             Swal.fire({
    //                                 title: 'Success!',
    //                                 text: 'Successfully added!',
    //                                 icon: 'success',
    //                                 confirmButtonText: 'OK'
    //                             })

    //                         } else {
    //                             Swal.fire({
    //                                 title: 'Error!',
    //                                 text: 'The course could not be saved',
    //                                 icon: 'error',
    //                                 confirmButtonText: 'Retry'
    //                             })
    //                         }
    //                     }
    //                 });
    //             } else if (result.isDenied) {
    //                 Swal.fire('Video are not added', '', 'info')
    //             }
    //         });
    //     } else {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     }
    // });

    // $(".agregar_video_basic").submit(function (e) {
    //     e.preventDefault();
    //     if ($("#selectVideoBasic").val() != "" && $("#inputTitleVideoBasic").val() != "" && $("#shortVideoTitleBasic").val() != "") {
    //         Swal.fire({
    //             title: 'Do you want to add this new video?',
    //             showDenyButton: true,
    //             showCancelButton: true,
    //             confirmButtonText: `Add`,
    //             denyButtonText: `Don't add`,
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: "http://localhost/CTW/Dashboard/AgregarVideoBasic",
    //                     data: new FormData(this),
    //                     contentType: false,
    //                     cache: false,
    //                     processData: false,
    //                     beforeSend: function () {
    //                         Swal.fire({
    //                             title: 'Please wait',
    //                             html: 'We are uploading your video',
    //                             didOpen: () => {
    //                                 Swal.showLoading()
    //                             },
    //                         })
    //                     },
    //                     success: function (response) {
    //                         console.log(response);
    //                         if (response >= 0) {
    //                             $(".videos-agregados-basic").empty()
    //                             $(".videos-agregados-basic").html('<a><i class="fas fa-play-circle"></i> ' + $("#inputTitleVideoBasic").val() + '</a>')
    //                             $("#selectVideoBasic").val('')
    //                             $("#inputTitleVideoBasic").val('')
    //                             $("#shortVideoTitleBasic").val('')
    //                             Swal.fire({
    //                                 title: 'Success!',
    //                                 text: 'Successfully added!',
    //                                 icon: 'success',
    //                                 confirmButtonText: 'OK'
    //                             })

    //                         } else {
    //                             Swal.fire({
    //                                 title: 'Error!',
    //                                 text: 'The course could not be saved',
    //                                 icon: 'error',
    //                                 confirmButtonText: 'Retry'
    //                             })
    //                         }
    //                     }
    //                 });
    //             } else if (result.isDenied) {
    //                 Swal.fire('Video are not added', '', 'info')
    //             }
    //         });
    //     } else {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     }
    // });

    // $(".agregar_video_medium").submit(function (e) {
    //     e.preventDefault();
    //     if ($("#selectVideoMedium").val() != "" && $("#inputTitleVideoMedium").val() != "" && $("#shortVideoTitleMedium").val() != "") {
    //         Swal.fire({
    //             title: 'Do you want to add this new video?',
    //             showDenyButton: true,
    //             showCancelButton: true,
    //             confirmButtonText: `Add`,
    //             denyButtonText: `Don't add`,
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: "http://localhost/CTW/Dashboard/AgregarVideoMedium",
    //                     data: new FormData(this),
    //                     contentType: false,
    //                     cache: false,
    //                     processData: false,
    //                     beforeSend: function () {
    //                         Swal.fire({
    //                             title: 'Please wait',
    //                             html: 'We are uploading your video',
    //                             didOpen: () => {
    //                                 Swal.showLoading()
    //                             },
    //                         })
    //                     },
    //                     success: function (response) {
    //                         console.log(response);
    //                         if (response >= 0) {
    //                             console.log(response);
    //                             $(".videos-agregados-medium").empty()
    //                             $(".videos-agregados-medium").html('<a><i class="fas fa-play-circle"></i> ' + $("#inputTitleVideoMedium").val() + '</a>')
    //                             $("#selectVideoMedium").val('')
    //                             $("#inputTitleVideoMedium").val('')
    //                             $("#shortVideoTitleMedium").val('')
    //                             Swal.fire({
    //                                 title: 'Success!',
    //                                 text: 'Successfully added!',
    //                                 icon: 'success',
    //                                 confirmButtonText: 'OK'
    //                             })

    //                         } else {
    //                             Swal.fire({
    //                                 title: 'Error!',
    //                                 text: 'The course could not be saved',
    //                                 icon: 'error',
    //                                 confirmButtonText: 'Retry'
    //                             })
    //                         }
    //                     }
    //                 });
    //             } else if (result.isDenied) {
    //                 Swal.fire('Course are not added', '', 'info')
    //             }
    //         });
    //     } else {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     }
    // });

    // $(".agregar_video_advanced").submit(function (e) {
    //     e.preventDefault();
    //     if ($("#selectVideoAdvanced").val() != "" && $("#inputTitleVideoAdvanced").val() != "" && $("#shortVideoTitleAdvanced").val() != "") {
    //         Swal.fire({
    //             title: 'Do you want to add this new video?',
    //             showDenyButton: true,
    //             showCancelButton: true,
    //             confirmButtonText: `Add`,
    //             denyButtonText: `Don't add`,
    //         }).then((result) => {
    //             if (result.isConfirmed) {
    //                 $.ajax({
    //                     type: "POST",
    //                     url: "http://localhost/CTW/dashboard/AgregarVideoAdvanced",
    //                     data: new FormData(this),
    //                     contentType: false,
    //                     cache: false,
    //                     processData: false,
    //                     beforeSend: function () {
    //                         Swal.fire({
    //                             title: 'Please wait',
    //                             html: 'We are uploading your video',
    //                             didOpen: () => {
    //                                 Swal.showLoading()
    //                             },
    //                         })
    //                     },
    //                     success: function (response) {
    //                         console.log(response);
    //                         if (response >= 0) {
    //                             console.log(response);
    //                             $(".videos-agregados-advanced").empty()
    //                             $(".videos-agregados-advanced").html('<a><i class="fas fa-play-circle"></i> ' + $("#inputTitleVideoAdvanced").val() + '</a>')
    //                             $("#selectVideoAdvanced").val('')
    //                             $("#inputTitleVideoAdvanced").val('')
    //                             $("#shortVideoTitleAdvanced").val('')
    //                             Swal.fire({
    //                                 title: 'Success!',
    //                                 text: 'Successfully added!',
    //                                 icon: 'success',
    //                                 confirmButtonText: 'OK'
    //                             })

    //                         } else {
    //                             Swal.fire({
    //                                 title: 'Error!',
    //                                 text: 'The course could not be saved',
    //                                 icon: 'error',
    //                                 confirmButtonText: 'Retry'
    //                             })
    //                         }
    //                     }
    //                 });
    //             } else if (result.isDenied) {
    //                 Swal.fire('Course are not added', '', 'info')
    //             }
    //         });
    //     } else {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     }
    // });

    // $(".agregar_recurso").submit(function (e) {
    //     e.preventDefault();
    //     if ($("#inputLink").val() != "" || $("#selectresource").val() != "") {
    //         if($("#inputLink").val() != "" && $("#selectresource").val() != ""){
    //             Swal.fire({
    //                 title: 'You can only save a link or a resource, not both.!',
    //                 text: 'Delete One',
    //                 icon: 'error',
    //                 confirmButtonText: 'Retry'
    //             })
    //         }else{
    //             Swal.fire({
    //                 title: 'Do you want to add this new resource?',
    //                 showDenyButton: true,
    //                 showCancelButton: true,
    //                 confirmButtonText: `Add`,
    //                 denyButtonText: `Don't add`,
    //             }).then((result) => {
    //                 if (result.isConfirmed) {
    //                     $.ajax({
    //                         type: "POST",
    //                         url: "http://localhost/CTW/dashboard/AgregarRecurso",
    //                         data: new FormData(this),
    //                         contentType: false,
    //                         cache: false,
    //                         processData: false,
    //                         beforeSend: function () {
    //                             Swal.fire({
    //                                 title: 'Please wait',
    //                                 html: 'We are uploading your video',
    //                                 didOpen: () => {
    //                                     Swal.showLoading()
    //                                 },
    //                             })
    //                         },
    //                         success: function (response) {
    //                             console.log(response);
    //                             $(".recursos-agregados").empty()
    //                             $.ajax({
    //                                 type: "POST",
    //                                 url: "http://localhost/CTW/dashboard/mostrarRecursosAjax/" + $("#recursoIdCourse").val(),
    //                                 data: null,
    //                                 success: function (response) {
    //                                     console.log(response);
    //                                     $(".recursos-agregados").html(response)
    //                                 }
    //                             });
    //                             $("#selectresource").val('')
    //                             Swal.fire({
    //                                 title: 'Success!',
    //                                 text: 'Successfully added!',
    //                                 icon: 'success',
    //                                 confirmButtonText: 'OK'
    //                             })
    //                         }
    //                     });
    //                 } else if (result.isDenied) {
    //                     Swal.fire('Resource are not added', '', 'info')
    //                 }
    //             });
    //         }
    //     } else {
    //         Swal.fire({
    //             title: 'Empty Requirements!',
    //             text: 'Enter all requeriments',
    //             icon: 'error',
    //             confirmButtonText: 'Retry'
    //         })
    //     }
    // });


    $(".btn_add_video").click(function (e) {
        $("#AgregarCapitulo").toggle();
    });

    // $(".btn_add_basic").click(function (e) {
    //     $("#AgregarCapituloBasico").toggle();
    // });

    // $(".btn_add_medium").click(function (e) {
    //     $("#AgregarCapituloMedium").toggle();
    // });

    // $(".btn_add_advanced").click(function (e) {
    //     $("#AgregarCapituloAdvanced").toggle();
    // });

    // $(".btn_add_resource").click(function (e) {
    //     $("#AgregarRecurso").toggle();
    // });

    // $("#btn_dashboard").click(function () {
    //     $("#DASHBOARD").show();
    //     $("#MyCourse").hide();
    //     $("#CreateCourse").hide();
    //     $("#Statics").hide();
    //     $("#addVideos").hide();
    // });

    $("#btn_mycourse").click(function () {
        $("#MyCourse").show();
        $("#DASHBOARD").hide();
        $("#CreateCourse").hide();
        $("#Statics").hide();
        $("#addVideos").hide();
    });

    // $("#btn_create").click(function () {
    //     $("#CreateCourse").show();
    //     $("#MyCourse").hide();
    //     $("#DASHBOARD").hide();
    //     $("#Statics").hide();
    //     $("#addVideos").hide();
    // });

    // $("#btn_statistics").click(function () {
    //     $("#Statics").show();
    //     $("#CreateCourse").hide();
    //     $("#MyCourse").hide();
    //     $("#DASHBOARD").hide();
    //     $("#addVideos").hide();
    // });

    // $(".btn_mycourse_videos").click(function () {
    //     $(".videosIdCourse").attr("value", $(this).val());
    //     $("#addVideos").show();
    //     $("#Statics").hide();
    //     $("#CreateCourse").hide();
    //     $("#MyCourse").hide();
    //     $("#DASHBOARD").hide();
    // });

    // $("#btn_mycourse_Sales").click(function () {
    //     $(".sales").toggle();
    // });

    // $(".btn-profile, .btn-password, .btn-logout").click(function () {
    //     Swal.fire({
    //         title: 'Do you want to save the changes?',
    //         showDenyButton: true,
    //         showCancelButton: true,
    //         confirmButtonText: `Save`,
    //         denyButtonText: `Don't save`,
    //     }).then((result) => {
    //         /* Read more about isConfirmed, isDenied below */
    //         if (result.isConfirmed) {
    //             Swal.fire('Saved!', '', 'success')
    //         } else if (result.isDenied) {
    //             Swal.fire('Changes are not saved', '', 'info')
    //         }
    //     });
    // });


    // $(".btn-logout").click(function () {
    //     Swal.fire({
    //         title: 'Are you sure?',
    //         text: "Are you sure you want to go out?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, I´m sure!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             window.location.href = "/PaginadeInicio/index.html";
    //         }
    //     });
    // });

    /* modal */

    // var $modal = $('#modal');

    // var image = document.getElementById('sample_image');

    // var cropper;

    // $('#upload_image').change(function (event) {
    //     var files = event.target.files;

    //     var done = function (url) {
    //         image.src = url;
    //         $modal.modal('show');
    //     };

    //     if (files && files.length > 0) {
    //         reader = new FileReader();
    //         reader.onload = function (event) {
    //             done(reader.result);
    //         };
    //         reader.readAsDataURL(files[0]);
    //     }
    // });

    // $modal.on('shown.bs.modal', function () {
    //     cropper = new Cropper(image, {
    //         aspectRatio: 1,
    //         viewMode: 3,
    //         preview: '.preview'
    //     });
    // }).on('hidden.bs.modal', function () {
    //     cropper.destroy();
    //     cropper = null;
    // });

    // $('#crop').click(function () {
    //     canvas = cropper.getCroppedCanvas({
    //         width: 400,
    //         height: 400
    //     });

    //     canvas.toBlob(function (blob) {
    //         url = URL.createObjectURL(blob);
    //         var reader = new FileReader();
    //         reader.readAsDataURL(blob);
    //         reader.onloadend = function () {
    //             $modal.modal('hide');
    //             $('#uploaded_image').attr('src', reader.result);
    //         };
    //     });
    // });

    // function httpRequest(url, callback) {
    //     const http = new XMLHttpRequest();
    //     http.open("GET", url);
    //     http.send();
    //     http.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             callback.apply(http);
    //         }
    //     }
    // }

});

function agrergarVideos(e) {
    $(".videosIdCourse").attr("value", $(e).val());
    $(".videos-agregados-intro").html(' <a>Cargando....</a>')

    $.ajax({
        type: "POST",
        url: "http://localhost/CTW/chat/traerMensajes/" + $("#introductionIdCourse").val() + "/" + $("#introductionLevel").val(),
        data: null,
        success: function (response) {
            if (response != "") {
                $(".videos-agregados-intro").html(response)
            } else {
                $(".videos-agregados-intro").html(' <a> No hay mensajes</a>')
            }
        }
    });

    $("#addVideos").show();
    $("#Statics").hide();
    $("#CreateCourse").hide();
    $("#MyCourse").hide();
    $("#DASHBOARD").hide();
}