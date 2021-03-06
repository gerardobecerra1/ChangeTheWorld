<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome icons -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styleCourse.css">
    <title>CTW | Curso</title>
</head>

<body>

    <!-- Navbar comienzo -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" id="img-logo" href="<?php echo constant('URL'); ?>principal"><img
                    src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt="Logo" style="width:200px;"></a>
            <a class="navbar-brand" id="text-course" href="#"><img
                    src="<?php if(!empty($this->curso->lType) && $this->curso->lType != ''){echo 'data:'.$this->curso->lType.';base64,'.base64_encode($this->curso->logo);}else{echo constant('URL').'public/img/MachineLearn.svg';} ?>"
                    alt="Logo" style="width:55px;"> <?php echo $this->curso->title; ?></a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" data-scroll-nav="0" href="#"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="1" href="#"><i class="fas fa-list"></i> Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="2" href="#"><i class="fas fa-newspaper"></i>
                            Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="3" href="#"><i class="fas fa-comments"></i> Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="4" href="#"> <i class="fas fa-phone-alt"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" href="#"><img src="IMG/avatar_opt.jpg" alt=""
                                    style="border-radius: 50%; width: 30px;">
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>usuario">Account
                                    settings</a>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>mycourse">My courses</a>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>chat">Chat</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>principal/cerrarSesion">Sign off</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto" id="navbar-nav-course">
                    <li class="nav-item">
                        <a href="<?php echo constant('URL'); ?>pago/compraCurso/<?php echo $this->curso->id_course; ?>"
                            class="btn btn-2">Buy for $<?php echo $this->curso->cost; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Final -->

    <!-- Home Inicio -->
    <section class="home d-flex align-items-center" id="home" data-scroll-index="0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="home-text">
                        <h1><?php echo $this->curso->title; ?></h1>
                        <p><?php echo $this->curso->short_description; ?></p>
                        <div class="section-rating">
                            <span>Rating: <?php echo $this->curso->average_rating; ?></span>
                            <!-- <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i> -->
                            <!-- <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i> -->
                            <!--
                           <h3>20.000 Usuarios</h3> -->
                        </div>

                        <div class="sign-up-btn">
                            <a href="<?php echo constant('URL'); ?>pago/compraCurso/<?php echo $this->curso->id_course; ?>"
                                class="btn btn-1">Buy for $<?php echo $this->curso->cost; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="home-img">
                        <img src="<?php if(!empty($this->curso->lType) && $this->curso->lType != ''){echo 'data:'.$this->curso->lType.';base64,'.base64_encode($this->curso->logo);}else{echo constant('URL').'public/img/MachineLearn.svg';} ?>"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Final -->

    <!-- Contents Inicio -->
    <section class="contents section-padding" id="contents" data-scroll-index="1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Course <span>content</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div id="accordion">
                        <div class="accordion-item">

                            <div class="accordion-header" data-toggle="collapse" data-target="#collapse-01">
                                <h3>Introduction</h3>
                                <h3><?php $numVideos = 0; foreach ($this->videosIntro as $row) {$numVideos=$numVideos+1;} echo $numVideos;?>
                                    videos</h3>
                            </div>
                            <div class="collapse show" id="collapse-01" data-parent="#accordion">
                                <?php foreach ($this->videosIntro as $row) {?>
                                <div class="accordion-body">
                                    <a
                                        href="<?php echo constant('URL'); ?>videos/traerVideo/<?php echo $row->id_video; ?>">
                                        <?php if($row->viewed) {?>
                                        <i class="fas fa-lock-open"></i>
                                        <?php }else{?>
                                        <i class="fas fa-lock"></i>
                                        <?php }?>
                                        <?php echo $row->title; ?>
                                    </a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                                <h3>Basic</h3>
                                <h3><?php $numVideos = 0; foreach ($this->videosBasic as $row) {$numVideos=$numVideos+1;} echo $numVideos;?>
                                    videos</h3>
                            </div>
                            <div class="collapse" id="collapse-02" data-parent="#accordion">
                                <?php foreach ($this->videosBasic as $row) {?>
                                <div class="accordion-body">
                                    <a
                                        href="<?php echo constant('URL'); ?>videos/traerVideo/<?php echo $row->id_video; ?>">
                                        <?php if($row->viewed) {?>
                                        <i class="fas fa-lock-open"></i>
                                        <?php }else{?>
                                        <i class="fas fa-lock"></i>
                                        <?php }?>
                                        <?php echo $row->title; ?></a>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                                <h3>Medium</h3>
                                <h3><?php $numVideos = 0; foreach ($this->videosMedium as $row) {$numVideos=$numVideos+1;} echo $numVideos;?>
                                    videos</h3>
                            </div>
                            <div class="collapse" id="collapse-03" data-parent="#accordion">
                                <?php foreach ($this->videosMedium as $row) {?>
                                <div class="accordion-body">
                                    <a
                                        href="<?php echo constant('URL'); ?>videos/traerVideo/<?php echo $row->id_video; ?>">
                                        <?php if($row->viewed) {?>
                                        <i class="fas fa-lock-open"></i>
                                        <?php }else{?>
                                        <i class="fas fa-lock"></i>
                                        <?php }?>
                                        <?php echo $row->title; ?></a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-04">
                                <h3>Advanced</h3>
                                <h3><?php $numVideos = 0; foreach ($this->videosAdvance as $row) {$numVideos=$numVideos+1;} echo $numVideos;?>
                                    videos</h3>
                            </div>
                            <div class="collapse" id="collapse-04" data-parent="#accordion">
                                <?php foreach ($this->videosAdvance as $row) {?>
                                <div class="accordion-body">
                                    <a
                                        href="<?php echo constant('URL'); ?>videos/traerVideo/<?php echo $row->id_video; ?>">
                                        <?php if($row->viewed) {?>
                                        <i class="fas fa-lock-open"></i>
                                        <?php }else{?>
                                        <i class="fas fa-lock"></i>
                                        <?php }?>
                                        <?php echo $row->title; ?></a>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-05">
                                <h3>Resources</h3>
                                <h3><?php $numReso = 0; foreach ($this->Resources as $row) {$numReso=$numReso+1;} echo $numReso;?>
                                    resources</h3>
                            </div>
                            <div class="collapse" id="collapse-05" data-parent="#accordion">
                                <?php foreach ($this->Resources as $row) {?>
                                <div class="accordion-body">
                                    <?php if($row->categorie == "Media"){?>
                                    <a href="#"><i class="fas fa-photo-video"></i> <?php echo $row->contentName; ?></a>
                                    <?php }else if($row->categorie == "File"){?>
                                    <a href="#"><i class="fas fa-file-pdf"></i> <?php echo $row->contentName; ?></a>
                                    <?php }else{?>
                                    <a href="<?php echo $row->link; ?>"><i class="fas fa-link"></i>
                                        <?php echo $row->link; ?></a>
                                    <?php }?>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content Final -->

    <!-- Description-Inicio -->
    <section class="description section-padding" id="description" data-scroll-index="2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title">
                    <h2>Course <span>description</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg description-content">
                    <p><?php echo $this->curso->short_description; ?></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Description-Final -->

    <!-- Instructor-Inicio -->
    <section class="instructor section-padding" id="instructor">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title">
                    <h2>Course <span>instructor</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex">
                    <div class="instructor-img">

                        <img src="<?php if(!empty($this->creadorCurso->pType) && $this->creadorCurso->pType != ''){echo 'data:'.$this->creadorCurso->pType.';base64,'.base64_encode($this->creadorCurso->photo);}else{echo constant('URL').'public/img/avatar_opt.jpg';} ?>"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="instructor-title">
                        <h1 class="name">
                            <?php echo $this->creadorCurso->name_user.' '.$this->creadorCurso->last_name; ?></h1>
                        <h3 class="subtitle"><?php echo $this->creadorCurso->description_user; ?></h3>
                    </div>
                    <!-- <ul class="list-unstyled">
                        <li><i class="fas fa-star"></i> Instructor Rating: 4.6</li>
                        <li><i class="fas fa-award"></i> 42,832 reviews</li>
                        <li><i class="fas fa-users"></i> 123,456 students</li>
                        <li><i class="fas fa-play-circle"></i> 4 courses</li>
                    </ul> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Instructor-Inicio -->

    <!-- Comments Inicio -->
    <section class="comments section-padding" id="comments" data-scroll-index="3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title">
                    <h2>Course <span>Comments</span></h2>
                </div>
            </div>
            <div class="row comments-box justify-content-center">
                <div class="col-lg-10">
                    <input style="display: none;" type="text" id="nombre" value="<?php echo $_SESSION['name'].' '.$_SESSION['lastname']; ?>">
                    <?php if($this->completo == 100){?>
                    <form method="POST" class="form-comments d-flex justify-content-end flex-wrap">
                        <input style="display: none;" type="text" value="<?php echo $this->curso->id_course; ?>" name="idC" id="idC">
                        <input style="display: none;" type="text" name="idU" id="idU" value="<?php echo $_SESSION['id']; ?>">
                        <label class="mr-4" for="rating">Select the rating: </label>
                        <input type="number" name="rating" id="rating" max="5" min="0">
                        <textarea class="mt-4" name="comentFinal" id="comentFinal"
                            placeholder="Write a comment"></textarea>
                        <button type="submit" name="submitRatingStar" id="submitRatingStar"
                            class="btn btn-sm">Send</button>
                    </form>
                    <?php }?>
                    
                    <?php foreach ($this->comentarios as $row) {?>
                    <div class="media">
                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74"
                            alt="">

                        <div class="media-body">
                            <p class="name"><?php echo $row->name.' '.$row->lastname; ?> <span><?php echo $row->comment_date?></span></p>
                            <p class="user-comment">
                            <?php echo $row->_message?>
                            </p>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Comments Final -->

    <!-- Conact Inicio -->
    <footer class="footer" data-scroll-index="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-col">
                        <h3>About us</h3>
                        <p>We are a company that is dedicated to giving the opportunity to learn and earn money doing
                            what you like.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-col">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms & conditions</a></li>
                            <li><a href="#">Lates blogs</a></li>
                            <li><a href="#">Page services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-col">
                        <h3>Quick links</h3>
                        <ul>
                            <li><a href="#home">Course</a></li>
                            <li><a href="#contents">Contents</a></li>
                            <li><a href="#description">Description</a></li>
                            <li><a href="#comments">Comments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-col">
                        <h3>Contact us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instragram</a></li>
                            <li><a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright-text">&copy;2021 Change the world</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Conact Final -->

    <!-- jquery js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- ALERTAS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- ScrollIt js -->
    <script src="<?php echo constant('URL'); ?>public/js/scrollIt.min.js"></script>
    <!-- jquery Rating js -->
    <script src="<?php echo constant('URL'); ?>public/js/jquery.rating.pack.js"></script>
    <!-- main js -->
    <script src="<?php echo constant('URL'); ?>public/js/mainCourse.js"></script>
</body>

</html>