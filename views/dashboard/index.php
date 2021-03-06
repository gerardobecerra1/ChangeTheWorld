<?php
// include_once 'librerias/user_session.php';
// $userSession = new UserSession();

if (isset($_SESSION['username']) && ((string)$_SESSION['rol']) == "Teacher") {
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
    <!-- JQUERY -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- photo css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/dash.css">
    <!-- CHARTS  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <title>CTW | Dashboard</title>
</head>

<body>
    <div class="d-flex">
        <div id="slidebar-container" class="silderbar">
            <div class="logo">
                <a href="<?php echo constant('URL'); ?>principal"><img
                        src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt=""></a>

            </div>
            <div class="menu">
                <!-- <a href="#" id="btn_dashboard" class="d-block p-3  font-weight-bold  "><i class="fas fa-table mr-2"
                        aria-hidden="true"></i>Dashboard</a> -->
                <a href="#" id="btn_mycourse" class="d-block p-3  font-weight-bold "><i class="fas fa-certificate mr-2"
                        aria-hidden="true"></i>My Courses</a>
                <a href="#" id="btn_create" class="d-block p-3  font-weight-bold "><i class="fas fa-plus-circle mr-2"
                        aria-hidden="true"></i>Create a course</a>
                <a href="#" id="btn_statistics" class="d-block p-3  font-weight-bold "><i class="fas fa-chart-bar mr-2"
                        aria-hidden="true"></i>Statistics</a>
            </div>
        </div>
        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="form-inline position-relative my-2 d-inline-block">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-search position-absolute " type="submit"><i class="fa fa-search"
                            aria-hidden="true"></i>
                    </button>
                </form>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php if(!empty($_SESSION['pType']) && $_SESSION['pType'] != ''){echo 'data:'.$_SESSION['pType'].';base64,'.base64_encode($_SESSION['photo']);}else{echo constant('URL').'public/img/sinFoto.png';} ?>"
                                    class="img-fluid rounded-circle mr-2 " id="avatar" alt="">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo constant('URL').'usuario'; ?>">My profile</a>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>chat">Chat</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>dashboard/cerrarSesion">log
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="content">
                <!-- <section id="DASHBOARD">
                    <section class="py-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h1 class="font-weight-bold mb-0 main-color">Welcome
                                        <?php echo $_SESSION['name'] . ' ' . $_SESSION['lastname']; ?></h1>
                                    <p class="lead text-muted">Check your information</p>
                                </div>
                                <div class="col-lg-3 d-flex">
                                    <button class="btn w-100 align-self-center" id="boton">Download report</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="bg-mix">
                        <div class="container">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 stat my-3 d-flex">
                                            <div class="mx-auto">
                                                <h6 class="text-muted ">Monthly income</h6>
                                                <h3 class="font-weight-bold main-color">$500,000</h3>
                                                <h6 class="text-success"><i class="fa fa-arrow-circle-up"
                                                        aria-hidden="true"></i>
                                                    50.50%</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 stat my-3 d-flex">
                                            <div class="mx-auto">
                                                <h6 class="text-muted ">Active courses</h6>
                                                <h3 class="font-weight-bold main-color">10</h3>
                                                <h6 class="text-success"><i class="fa fa-arrow-circle-up"
                                                        aria-hidden="true"></i>
                                                    50.50%</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 stat my-3 d-flex">
                                            <div class="mx-auto">
                                                <h6 class="text-muted ">Number of users</h6>
                                                <h3 class="font-weight-bold main-color">500</h3>
                                                <h6 class="text-success"> <i class="fa fa-arrow-circle-up"
                                                        aria-hidden="true"></i>
                                                    50.50%</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 my-3 d-flex">
                                            <div class="mx-auto">
                                                <h6 class="text-muted">New users</h6>
                                                <h3 class="font-weight-bold main-color">25</h3>
                                                <h6 class="text-success"><i class="fa fa-arrow-circle-up"
                                                        aria-hidden="true"></i>
                                                    50.50%</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="bg-grey">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 my-1">
                                    <div class="card rounded-0 ">
                                        <div class="card-body" id="grafico">
                                            <h6 class="font-weight-bold main-color ">Top cursos</h6>
                                            <canvas id="VentasCursos"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 my-3">
                                    <div class="card rounded-0">
                                        <div class="card-header bg-light">
                                            <h6 class="font-weight-bold main-color ">Recent courses</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <h2 class="mb-0 align-self-center"><i class="fa fa-tag main-color"
                                                            aria-hidden="true"></i>
                                                    </h2>
                                                </div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block mb-0">$250</h6><span
                                                        class="bafge badge-success ml-2">10% descuento</span>
                                                    <small class="d-block text-muted">Course of HTML 5</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex border-bottom py-2">
                                                <div class="d-flex mr-3">
                                                    <H2 class="mb-0 align-self-center"><i class="fa fa-tag main-color"
                                                            aria-hidden="true"></i>
                                                    </H2>
                                                </div>
                                                <div class="align-self-center">
                                                    <h6 class="d-inline-block mb-0">$250</h6><span
                                                        class="bafge badge-success ml-2">10% descuento</span>
                                                    <small class="d-block text-muted">Course of HTML 5</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section> -->

                <section class="mycourses" id="MyCourse">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12  main-color">
                                <div class="section-title ">
                                    <h1 class="font-weight-bold main-color text-center">My Courses</h1>
                                </div>
                            </div>
                        </div>
                        <div class="ver-ventas mb-3">
                            <a href="#" id="btn_mycourse_Sales" class="btn main-color ">View sales
                                <ion-icon class="align-self-center" name="caret-down-outline">
                                </ion-icon> </a>
                        </div>
                        <div class="row justify-content-left" id="Cursosapartado">
                            <?php foreach ($this->miscursos as $row) {?>
                            <div class="col-lg-4 mb-3">
                                <div class="card">
                                    <img src="<?php if(!empty($row->lType) && $row->lType != ''){echo 'data:'.$row->lType.';base64,'.base64_encode($row->logo);}else{echo constant('URL').'public/img/Machine.jpg';} ?>"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row->title ?></h5>
                                        <p class="card-text"><?php echo $row->short_description ?></p>
                                        <div class="botones text-center mt-3 d-flex">
                                            <!-- <button id="btn_mycourse_edit" class="btn main-color ml-1 mr-1"
                                                value="<?php echo $row->id_course ?>"><i
                                                    class="far fa-edit"></i></button> -->
                                            <button class="btn btn_mycourse_videos main-color ml-1 mr-1"
                                                onclick="agrergarVideos(this)" value="<?php echo $row->id_course ?>"><i
                                                    class="fas fa-film"></i> Add</button>
                                        </div>
                                        <div class="sales my-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h6 class="text-muted text-center ">Sales:</h6>
                                                    <h3 class="font-weight-bold main-color text-center">200</h3>
                                                </div>
                                                <div class="col-6">
                                                    <h6 class="text-muted text-center">Income:</h6>
                                                    <h3 class="font-weight-bold main-color text-center">$500,000</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </section>

                <section class="CreateCourse" id="CreateCourse">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12  main-color">
                                <div class="section-title ">
                                    <h1 class="font-weight-bold main-color text-center">Create Course</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container my-5 mx-5">
                                <form class="curso_crear" method="POST" enctype="multipart/form-data">
                                    <div class="form-group text-center">
                                        <div class="select-photo w-50 mx-auto">
                                            <label for="upload_image">
                                                <img src="<?php echo constant('URL'); ?>public/img/sinFoto.png"
                                                    id="uploaded_image" class="img-responsive" />
                                                <div class="overlay">
                                                    <div class="text">Click to Change Course Image</div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image"
                                                    style="display:none" />
                                            </label>
                                        </div>
                                        <small class="form-text text-muted">Make sure it is an image in PNG
                                            format</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">Type:</label>
                                        <select name="role_dash" id="tipo-dash" class="selector">
                                            <?php foreach ($this->categorias as $row) {?>
                                            <option value="<?php echo $row->id_categorie ?>">
                                                <?php echo $row->name_categorie ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo">New categorie:</label>
                                        <input type="text" id="inputCategoria">
                                        <button type="button" class="btn" id="btnAgregarCategoria">Agregar</button>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Example:
                                            <strong>Complete course on Multimedia Database</strong></label>
                                        <input type="text" class="form-control" name="inputTitle" id="inputTitle"
                                            aria-describedby="TitleHelp" placeholder="Write new title">
                                        <small id="TitleHelp" class="form-text text-muted">This text will be seen on the
                                            course page.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescriptionS">Short description:</label>
                                        <textarea name="ShortD" id="ShortD" class="w-100" style="min-height: 100px;"
                                            placeholder="Write something short about your course"></textarea>
                                        <small id="inputDescriptionSHelp" class="form-text text-muted">Be as brief as
                                            possible but understand what your course is about.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPrice">Price:</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input id="inputPrice" name="inputPrice" type="text" class="form-control"
                                                aria-label="Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescriptionL">Long description:</label>
                                        <textarea name="longD" id="longD" class="w-100" style="min-height: 200px;"
                                            placeholder="Write something short about your course"></textarea>
                                        <small id="inputDescriptionLHelp" class="form-text text-muted">It includes
                                            everything that users of this course should know, requirements, about,
                                            etc.</small>
                                    </div>
                                    <div class="botones mb-5">
                                        <button type="submit" class="btn btn-course">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="Statics" id="Statics">
                    <div class="container">
                        <div class="row ">
                        <div class="col-lg-9">
                                    <h1 class="font-weight-bold mb-0 main-color">Welcome
                                        <?php echo $_SESSION['name'] . ' ' . $_SESSION['lastname']; ?></h1>
                                    <p class="lead text-muted">Check your information</p>
                                </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-lg-6 mb-3">
                                <h4 class="my-3 text-muted">Earnings from all my courses.</h4>
                                <canvas id="DineroVentas" class="my-3"></canvas>
                            </div>

                            <div class="col-lg-6 mb-3 text-muted">
                                <h4 class="my-3">Course sales</h4>
                                <canvas id="VentasCurso" class="my-3"></canvas>
                            </div>
                        </div>
                        <input style="display: none;" type="text" value="<?php echo $_SESSION['id'];?>" id="identificaParaTotal">
                        <div class="row" id="total_todo">
                            <div class="col-lg-4 my-3  ">
                                <h6 class="text-muted text-center ">TOTAL COURSES:</h6>
                                <h1 class="font-weight-bold main-color text-center ">10</h1>
                            </div>
                            <div class="col-lg-4 my-3  ">
                                <h6 class="text-muted text-center ">TOTAL STUDENTS:</h6>
                                <h1 class="font-weight-bold main-color text-center ">100</h1>
                            </div>
                            <div class="col-lg-4 my-3  ">
                                <h6 class="text-muted text-center ">TOTAL EARNINGS:</h6>
                                <h1 class="font-weight-bold main-color text-center ">$200,000.00</h1>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="addVideos" id="addVideos">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 main-color">
                                <div class="section-title ">
                                    <h1 class="font-weight-bold main-color text-center">Add Videos</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="form-group w-100">
                                    <label for="inputAbout">Course Content:</label>
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Introduction
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="accordion-body videos-agregados-intro"
                                                        style="display: grid;">
                                                        <a>Cargando....</a>
                                                    </div>
                                                    <button class="btn btn_add_video w-100 mt-4"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                                        Video</button>
                                                    <div class="container my-3" id="AgregarCapitulo">
                                                        <form class="agregar_video_introduction" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input id="introductionIdCourse"
                                                                class="videosIdCourse d-none"
                                                                name="introductionIdCourse" value="" type="text">
                                                            <input id="introductionLevel" class="d-none"
                                                                name="introductionLevel" value="0" type="text">
                                                            <div class="form-group mb-3">
                                                                <label for="inputGroupFile01">Select video:</label>
                                                                <input type="file" name="selectVideoIntro"
                                                                    id="selectVideoIntro">
                                                                <select class="ml-5" name="introductionFree"
                                                                    id="introductionFree">
                                                                    <option value="0">Payment</option>
                                                                    <option value="1">Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputTitleVideoIntro">Example:
                                                                    <strong>Complete course on Multimedia
                                                                        Database</strong></label>
                                                                <input type="text" class="form-control"
                                                                    id="inputTitleVideoIntro"
                                                                    name="inputTitleVideoIntro"
                                                                    aria-describedby="TitleHelp"
                                                                    placeholder="Write new title">
                                                                <small id="TitleHelp" class="form-text text-muted">This
                                                                    text will be seen on the
                                                                    course page.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDescriptionS">Short
                                                                    description:</label>
                                                                <textarea name="shortVideoTitle" id="shortVideoTitle"
                                                                    class="w-100" style="min-height: 100px;"
                                                                    placeholder="Write something short about your course"></textarea>
                                                                <small id="inputDescriptionSHelp"
                                                                    class="form-text text-muted">Be as
                                                                    brief as
                                                                    possible but understand what your course is
                                                                    about.</small>
                                                            </div>
                                                            <div class="botones">
                                                                <button type="submit"
                                                                    class="btn btn-video">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                        Basic
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="accordion-body videos-agregados-basic" style="display: grid;">
                                                        <a>Cargando....</a>
                                                    </div>
                                                    <button class="btn btn_add_basic w-100 mt-4"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                                        Video</button>
                                                    <div class="container my-3" id="AgregarCapituloBasico">
                                                        <form class="agregar_video_basic" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input id="basicIdCourse" class="videosIdCourse d-none"
                                                                name="basicIdCourse" value="" type="text">
                                                            <input id="basicLevel" class="d-none" name="basicLevel"
                                                                value="1" type="text">
                                                            <div class="form-group mb-3">
                                                                <label for="inputGroupFile02">Select video:</label>
                                                                <input type="file" name="selectVideoBasic"
                                                                    id="selectVideoBasic">
                                                                <select class="ml-5" name="basicFree" id="basicFree">
                                                                    <option value="0">Payment</option>
                                                                    <option value="1">Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputTitleVideoBasic">Example:
                                                                    <strong>Complete course on Multimedia
                                                                        Database</strong></label>
                                                                <input type="text" class="form-control"
                                                                    id="inputTitleVideoBasic"
                                                                    name="inputTitleVideoBasic"
                                                                    aria-describedby="TitleHelp"
                                                                    placeholder="Write new title">
                                                                <small id="TitleHelp" class="form-text text-muted">This
                                                                    text will be seen on the
                                                                    course page.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDescriptionS">Short
                                                                    description:</label>
                                                                <textarea name="shortVideoTitleBasic"
                                                                    id="shortVideoTitleBasic" class="w-100"
                                                                    style="min-height: 100px;"
                                                                    placeholder="Write something short about your course"></textarea>
                                                                <small id="inputDescriptionSHelp"
                                                                    class="form-text text-muted">Be as
                                                                    brief as
                                                                    possible but understand what your course is
                                                                    about.</small>
                                                            </div>
                                                            <div class="botones">
                                                                <button type="submit"
                                                                    class="btn btn-video">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapseThree" aria-expanded="false"
                                                        aria-controls="collapseThree">
                                                        Medium
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="accordion-body videos-agregados-medium" style="display: grid;">
                                                        <a href="#">Example: <i class="fas fa-play-circle"></i>
                                                            Introduction</a>
                                                    </div>
                                                    <button class="btn btn_add_resource w-100 mt-4"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                                        Resoruce</button>
                                                    <div class="container my-3" id="AgregarCapituloMedium">
                                                        <form class="agregar_video_medium" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input id="mediumIdCourse" class="videosIdCourse d-none"
                                                                name="mediumIdCourse" value="" type="text">
                                                            <input id="mediumLevel" class="d-none" name="mediumLevel"
                                                                value="2" type="text">
                                                            <div class="form-group mb-3">
                                                                <label for="inputGroupFile03">Select video:</label>
                                                                <input type="file" name="selectVideoMedium"
                                                                    id="selectVideoMedium">
                                                                <select class="ml-5" name="mediumFree" id="mediumFree">
                                                                    <option value="0">Payment</option>
                                                                    <option value="1">Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputTitleVideoMedium">Example:
                                                                    <strong>Complete course on Multimedia
                                                                        Database</strong></label>
                                                                <input type="text" class="form-control"
                                                                    id="inputTitleVideoMedium"
                                                                    name="inputTitleVideoMedium"
                                                                    aria-describedby="TitleHelp"
                                                                    placeholder="Write new title">
                                                                <small id="TitleHelp" class="form-text text-muted">This
                                                                    text will be seen on the
                                                                    course page.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDescriptionS">Short
                                                                    description:</label>
                                                                <textarea name="shortVideoTitleMedium"
                                                                    id="shortVideoTitleMedium" class="w-100"
                                                                    style="min-height: 100px;"
                                                                    placeholder="Write something short about your course"></textarea>
                                                                <small id="inputDescriptionSHelp"
                                                                    class="form-text text-muted">Be as
                                                                    brief as
                                                                    possible but understand what your course is
                                                                    about.</small>
                                                            </div>
                                                            <div class="botones">
                                                                <button type="submit"
                                                                    class="btn btn-video">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFour">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapseFour" aria-expanded="false"
                                                        aria-controls="collapseFour">
                                                        Advanced
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="accordion-body videos-agregados-advanced" style="display: grid;">
                                                        <a>Cargando....</a>
                                                    </div>
                                                    <button class="btn btn_add_advanced w-100 mt-4"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                                        Video</button>
                                                    <div class="container my-3" id="AgregarCapituloAdvanced">
                                                        <form class="agregar_video_advanced" method="POST"
                                                            enctype="multipart/form-data">
                                                            <input id="advancedIdCourse" class="videosIdCourse d-none"
                                                                name="advancedIdCourse" value="" type="text">
                                                            <input id="advancedLevel" class="d-none"
                                                                name="advancedLevel" value="3" type="text">
                                                            <div class="form-group mb-3">
                                                                <label for="inputGroupFile04">Select video:</label>
                                                                <input type="file" name="selectVideoAdvanced"
                                                                    id="selectVideoAdvanced">
                                                                <select class="ml-5" name="advancedFree"
                                                                    id="advancedFree">
                                                                    <option value="0">Payment</option>
                                                                    <option value="1">Free</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputTitleVideoAdvanced">Example:
                                                                    <strong>Complete course on Multimedia
                                                                        Database</strong></label>
                                                                <input type="text" class="form-control"
                                                                    id="inputTitleVideoAdvanced"
                                                                    name="inputTitleVideoAdvanced"
                                                                    aria-describedby="TitleHelp"
                                                                    placeholder="Write new title">
                                                                <small id="TitleHelp" class="form-text text-muted">This
                                                                    text will be seen on the
                                                                    course page.</small>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputDescriptionS">Short
                                                                    description:</label>
                                                                <textarea name="shortVideoTitleAdvanced"
                                                                    id="shortVideoTitleAdvanced" class="w-100"
                                                                    style="min-height: 100px;"
                                                                    placeholder="Write something short about your course"></textarea>
                                                                <small id="inputDescriptionSHelp"
                                                                    class="form-text text-muted">Be as
                                                                    brief as
                                                                    possible but understand what your course is
                                                                    about.</small>
                                                            </div>
                                                            <div class="botones">
                                                                <button type="submit"
                                                                    class="btn btn-video">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingFive">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse"
                                                        data-target="#collapseFive" aria-expanded="true"
                                                        aria-controls="collapseFive">
                                                        Resources
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                                data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="accordion-body recursos-agregados"
                                                        style="display: grid;">
                                                        <a>Cargando....</a>
                                                    </div>
                                                    <button class="btn btn_add_resource w-100 mt-4"><i
                                                            class="fa fa-plus-circle" aria-hidden="true"></i> Add
                                                        Resource</button>
                                                    <div class="container my-3" id="AgregarRecurso">
                                                        <form class="agregar_recurso" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="form-group mt-4">
                                                                <label for="tipo">Type:</label>
                                                                <select name="role_resource" id="tipo-resource"
                                                                    class="selector">
                                                                    <option value="File">File</option>
                                                                    <option value="Media">Media</option>
                                                                    <option value="Link">Link</option>
                                                                </select>
                                                            </div>
                                                            <input id="recursoIdCourse" class="videosIdCourse d-none"
                                                                name="recursoIdCourse" value="" type="text">
                                                            <div class="form-group mb-3">
                                                                <label for="inputGroupFile01">Select resource:</label>
                                                                <input type="file" name="selectresource"
                                                                    id="selectresource">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputLink">Paste a link</label>
                                                                <input type="text" class="form-control" id="inputLink"
                                                                    name="inputLink" aria-describedby="TitleHelp"
                                                                    placeholder="Write new title">
                                                            </div>
                                                            <div class="botones">
                                                                <button type="submit"
                                                                    class="btn btn-video">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- ModalPhoto Incio -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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

    <script>
        var ctx = document.getElementById('VentasCursos').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['HTML', 'CSS', 'PHP', 'JQUERY', 'MYSQK'],
                datasets: [{
                    label: 'SALES',
                    backgroundColor: '#665df5',
                    maxBardThickness: 10,
                    borderColor: 'rgb(255, 99, 132)',
                    data: [20, 10, 50, 20, 20, ]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('DineroVentas').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ['HTML', 'CSS', 'PHP', 'JQUERY', 'MYSQK'],
                datasets: [{
                    label: 'EARNINGS',
                    backgroundColor: ['rgb(13, 4, 255)',
                        'rgb(233, 255, 4)',
                        'rgb(255, 122, 12)',
                        'rgb(255, 99, 132)'
                    ],
                    maxBardThickness: 10,
                    borderColor: 'rgb(255, 99, 132)',
                    data: [20, 10, 50, 20, 20, ]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

    <script>
        var ctx = document.getElementById('VentasCurso').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: ['HTML', 'CSS', 'PHP', 'JQUERY', 'MYSQK'],
                datasets: [{
                    label: 'Course sales',
                    backgroundColor: ['rgb(13, 4, 255)',
                        'rgb(233, 255, 4)',
                        'rgb(255, 122, 12)',
                        'rgb(255, 99, 132)'
                    ],
                    maxBardThickness: 10,
                    borderColor: 'rgb(255, 99, 132)',
                    data: [20, 10, 50, 20, 20, ]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- ALERTAS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- <script src="sweetalert2.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- photo js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
    <!-- js -->
    <script src="<?php echo constant('URL'); ?>public/js/dash.js"></script>

</html>
<?php
}else if(((string)$_SESSION['rol']) == "Student"){
    header('Location:' . constant('URL') . 'principal');
} 
else {
    header('Location:' . constant('URL') . 'landing');
}
?>