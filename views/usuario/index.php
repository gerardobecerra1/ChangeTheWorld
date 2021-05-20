<?php
include_once 'librerias/user_session.php';
$userSession = new UserSession();

if (isset($_SESSION['username'])) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/owl.carousel.min.css">
    <!-- photo css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styleUsuario.css">
    <title>CTW | Profile</title>
</head>

<body>
    <!-- Navbar Inicio -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" id="img-logo" href="<?php echo constant('URL'); ?>Landing"><img
                    src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt="Logo" style="width:200px;"></a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="0" href="<?php echo constant('URL'); ?>Principal"><i
                                class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="1" href="#"><i class="fas fa-search"></i> Search</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Final -->

    <!-- Fomrs Inicio -->
    <section class="forms">
        <div class="container">
            <div class="row">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fas fa-id-card"></i>
                        Profile</a>
                    <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
                        aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-key"></i> Password</a>
                    <a class="nav-link btn-logout" href="#"><i class="fas fa-sign-out-alt"></i> Sign off</a>
                </div>
                <div class="tab-content w-50 mx-auto" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <div class="container">
                        <p><?php echo $this->mensaje; ?></p>
                            <form method="POST" enctype="multipart/form-data" action="Usuario/updatePublic">
                                <div class="form-group text-center">
                                    <div class="select-photo w-50 mx-auto">
                                            <label for="upload_image">
                                                <img src="<?php if(!empty($_SESSION['pType']) && $_SESSION['pType'] != ''){echo 'data:'.$_SESSION['pType'].';base64,'.base64_encode($_SESSION['photo']);}else{echo constant('URL').'public/img/sinFoto.png';} ?>"
                                                    id="uploaded_image" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Click to Change Profile Image</div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image"
                                                    style="display:none" />
                                            </label>
                                    </div>

                                    <small class="form-text text-muted">This will be seen every time you post something
                                        or comment like chats.</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputLaschange">Last Change: <strong><?php echo $_SESSION['lastchange']; ?></strong></label>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername">Username:</label>
                                    <input type="text" class="form-control" name="username" id="inputUsername"
                                        aria-describedby="usernameHelp" placeholder="<?php if (!empty($_SESSION['username'])) {echo $_SESSION['username'];} else {echo 'Write new username';}?>">
                                    <small id="usernameHelp" class="form-text text-muted">This will be seen every time
                                        you post something or comment like chats.</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Name:</label>
                                    <input type="text" class="form-control" name="name" id="inputName" aria-describedby="nameHelp" placeholder="<?php if (isset($_SESSION['name'])) {echo $_SESSION['name'];} else {echo 'Write new name';}?>">
                                        <br>
                                    <label for="inputLastName">Lastname:</label>
                                    <input type="text" class="form-control" name="last" id="inputLastName" aria-describedby="lastNameHelp"
                                        placeholder="<?php if (!empty($_SESSION['name'])) {echo $_SESSION['lastname'];} else {echo 'Write new Lastname';}?>">
                                    <small id="nameHelp" class="form-text text-muted">This will be used once you finish
                                        the courses for your certificates.</small>
                                </div>
                                <div class="form-group">
                                    <label for="inputAbout">About me:</label>
                                    <textarea name="descrip" id="textareaAbout" class="w-100 form-control" aria-describedby="aboutHelp" rows="5"
                                           placeholder="<?php if (!empty($_SESSION['descrip'])) {echo $_SESSION['descrip'];} else {echo 'Write something about yourself, skills, tastes ...';}?>"></textarea>
                                    <small id="aboutHelp" class="form-text text-muted">This is just to know more about
                                        you.</small>
                                </div>
                                <div class="botones">
                                    <button type="submit" class="btn btn-profile">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade justify-content-center" id="v-pills-password" role="tabpanel"
                        aria-labelledby="v-pills-password-tab">
                        <div class="container">
                            <form action="">
                                <div class="form-group">
                                    <label for="inputEmail">Email:</label>
                                    <input type="email" class="form-control" id="inputEmail"
                                        aria-describedby="emailHelp" placeholder="<?php if (!empty($_SESSION['email'])) {echo $_SESSION['email'];} else {echo 'Write new email';}?>">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                        anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Password:</label>
                                    <input type="password" class="form-control mb-3" id="InputPassword"
                                        placeholder="Password">
                                    <input type="password" class="form-control mb-3" id="InputRewritePassword"
                                        placeholder="Rewrite Password">
                                </div>
                                <div class="botones">
                                    <button type="button" class="btn btn-password">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fomrs Final -->

    <!-- ModalPhoto Incio -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4 my-auto">
                                <div class="preview mx-auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalPhoto Final -->

    <!-- jquery js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- ScrollIt js -->
    <script src="<?php echo constant('URL'); ?>public/js/scrollIt.min.js"></script>
    <!-- sweetalert2 js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- photo js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
    <!-- main js -->
    <script src="<?php echo constant('URL'); ?>public/js/mainUsuario.js"></script>
</body>

</html>
<?php
} else {
    header('Location:' . constant('URL') . 'Landing');
}
?>