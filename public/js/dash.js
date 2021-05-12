$(document).ready(function () {

    $(".btn_add_video").click(function (e) { 
        $("#AgregarCapitulo").toggle();
    });

    $("#btn_dashboard").click(function () {
        $("#DASHBOARD").show();
        $("#MyCourse").hide();
        $("#CreateCourse").hide();
        $("#Statics").hide();
        $("#teacherProfile").hide();
    });

    $("#btn_mycourse").click(function () {
        $("#MyCourse").show();
        $("#DASHBOARD").hide();
        $("#CreateCourse").hide();
        $("#Statics").hide();
        $("#teacherProfile").hide();
    });

    $("#btn_create").click(function () {
        $("#CreateCourse").show();
        $("#MyCourse").hide();
        $("#DASHBOARD").hide();
        $("#Statics").hide();
        $("#teacherProfile").hide();
    });

    $("#btn_statistics").click(function () {
        $("#Statics").show();
        $("#CreateCourse").hide();
        $("#MyCourse").hide();
        $("#DASHBOARD").hide();
        $("#teacherProfile").hide();
    });

    $("#btn_profile").click(function () {
        $("#teacherProfile").show();
        $("#Statics").hide();
        $("#CreateCourse").hide();
        $("#MyCourse").hide();
        $("#DASHBOARD").hide();
    });

    $("#btn_mycourse_Sales").click(function () {
        $(".sales").toggle();
    });

    $(".btn-profile, .btn-password, .btn-logout").click(function () {
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Save`,
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        });
    });


    $(".btn-logout").click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to go out?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, I´m sure!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/PaginadeInicio/index.html";
            }
        });
    });

    /* modal */

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function (event) {
        var files = event.target.files;

        var done = function (url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function (event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function () {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });

        canvas.toBlob(function (blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                $modal.modal('hide');
                $('#uploaded_image').attr('src', reader.result);
            };
        });
    });

});