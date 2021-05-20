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
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/stylePrincipal.css">
    <title>CTW | Principal</title>
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
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse  text-center navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto" id="navbar-nav">
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link" data-scroll-nav="0" href="#"><i class="fas fa-home"></i> Home</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link" data-scroll-nav="1" href="#"><i class="fas fa-search"></i> Search</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" href="#"><img
                                    src="<?php if(!empty($_SESSION['pType']) && $_SESSION['pType'] != ''){echo 'data:'.$_SESSION['pType'].';base64,'.base64_encode($_SESSION['photo']);}else{echo constant('URL').'public/img/sinFoto.png';} ?>"
                                    alt="" style="border-radius: 50%; width: 30px;"><?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>Usuario">Account
                                    settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="<?php echo constant('URL'); ?>Principal/cerrarSesion">Sign off</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Final -->

    <!-- Main Inicio -->
    <section class="courses section-padding" id="courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Recommended For <span>You</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel courses-carousel">
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/algebra.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body ">
                                <h5 class="card-title">Complete Linear Algebra Course from Zero to Expert</h5>
                                <p class="card-text">Learn the basics to apply linear algebra to Statistics, Machine
                                    Learning and Artificial Intelligence</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/Unreal.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Master Unreal Engine 4 Game Development with Blueprints</h5>
                                <p class="card-text">Learn to create AAA Videogames FROM SCRATCH, complete development
                                    and programming with Blueprints and Unreal</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/deeplearn.jpeg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Deep Learning: Neural Networks in Python from Scratch</h5>
                                <p class="card-text">Learn how to create deep learning algorithms in Python with machine
                                    learning and data science experts</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/blender.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Character sculpture with Blender 2.91</h5>
                                <p class="card-text">Learn everything you need to create 3D characters with Blender's
                                    sculpture mode tools</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Final -->

    <!-- Main Inicio -->
    <section class="courses section-padding" id="courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Most <span>recent</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel courses-carousel">
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/algebra.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body ">
                                <h5 class="card-title">Complete Linear Algebra Course from Zero to Expert</h5>
                                <p class="card-text">Learn the basics to apply linear algebra to Statistics, Machine
                                    Learning and Artificial Intelligence</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/Unreal.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Master Unreal Engine 4 Game Development with Blueprints</h5>
                                <p class="card-text">Learn to create AAA Videogames FROM SCRATCH, complete development
                                    and programming with Blueprints and Unreal</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/deeplearn.jpeg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Deep Learning: Neural Networks in Python from Scratch</h5>
                                <p class="card-text">Learn how to create deep learning algorithms in Python with machine
                                    learning and data science experts</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/blender.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Character sculpture with Blender 2.91</h5>
                                <p class="card-text">Learn everything you need to create 3D characters with Blender's
                                    sculpture mode tools</p>
                                <div class="botones text-center">
                                    <a href="PaginaCurso.html" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Final -->

    <!-- Main Inicio -->
    <section class="categories section-padding" id="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Other <span>Categories</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel categories-carousel">
                    <?php foreach ($this->categorias as $row) {?>
                    <div class="categories-item">
                        <div class="card" style="border: none;">
                            <div class="card-body">
                                <div class="botones card-title text-center">
                                    <a href="<?php echo constant('URL'); ?>Categoria/cargarCursos/<?php echo $row->name_categorie ?>/<?php echo $row->id_categorie ?>"
                                        class="btn"><?php echo $row->name_categorie ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Main Final -->

    <!-- Conact Inicio -->
    <footer class="footer" id="footer">
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
    <!-- ScrollIt js -->
    <script src="<?php echo constant('URL'); ?>public/js/scrollIt.min.js"></script>
    <!-- owl carousel js -->
    <script src="<?php echo constant('URL'); ?>public/js/owl.carousel.min.js"></script>
    <!-- main js -->
    <script src="<?php echo constant('URL'); ?>public/js/mainPrincipal.js"></script>
</body>

</html>
<?php
} else {
    header('Location:' . constant('URL') . 'Landing');
}
?>