$(document).ready(function () {

  $(".Usuario_perfil").submit(function (e) {
    e.preventDefault();
    if ($("#upload_image").val() != "" || $("#inputUsername").val() != "" || $("#inputName").val() != "" || $("#inputLastName").val() != "" || $("#textareaAbout").val() != "") {
      Swal.fire({
        title: 'Do you want to save the changes?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Save`,
        denyButtonText: `Don't save`,
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: "http://localhost/CTW/usuario/updatePublic",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
              Swal.fire({
                title: 'Please wait',
                html: 'We are uploading your data',
                didOpen: () => {
                  Swal.showLoading()
                },
              })
            },
            success: function (response) {
              var jsonData = JSON.parse(response)

              $(".inputLaschange").empty();
              $("#inputUsername").val('')
              $("#inputName").val('')
              $("#inputLastName").val('')
              $("#textareaAbout").val('')

              $(".inputLaschange").html('Last Change: <strong>' + jsonData.lastchange + '</strong>')
              $("#inputUsername").attr('placeholder', jsonData.username)
              $("#inputName").attr('placeholder', jsonData.name)
              $("#inputLastName").attr('placeholder', jsonData.last)
              $("#textareaAbout").attr('placeholder', jsonData.descrip)

              Swal.fire({
                title: 'Success!',
                text: 'Successfully change!',
                icon: 'success',
                confirmButtonText: 'OK'
              })
            }
          });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
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
        window.location.href = "usuario/cerrarSesion";
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
        // $('#reco').attr('value', reader.result);
      };
    });
  });

});