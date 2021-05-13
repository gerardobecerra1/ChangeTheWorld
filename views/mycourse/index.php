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
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styleMycourse.css">
    <title>CTW | My course</title>
</head>

<body>
    <!-- Navbar Inicio -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" id="img-logo" href="<?php echo constant('URL'); ?>Landing"><img src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt="Logo"
                    style="width:200px;"></a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon" ><i class="fas fa-bars"></i></span>
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
                                aria-expanded="false" href="#"><img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" alt=""
                                    style="border-radius: 50%; width: 30px;">
                                Username
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>Usuario">Account settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>Landing">Sign off</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Final -->

    <section class="mycourses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title">
                        <h2>My <span>Courses</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card col-lg-4 col-md-6 col-sm-8 px-0 mb-3" style="width: 18rem;">
                    <img src="IMG/Machine.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Complete Machine Learning course</h5>
                        <p class="card-text">Learn the algorithms of Machine Learning with Python to become a Data
                            Science with all the code to use.</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <div class="botones text-center mt-3">
                            <a href="PaginaCurso.html" class="btn">View videos</a>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-8 px-0 mb-3" style="width: 18rem;">
                    <img src="IMG/Machine.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Complete Machine Learning course</h5>
                        <p class="card-text">Learn the algorithms of Machine Learning with Python to become a Data
                            Science with all the code to use.</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <div class="botones text-center mt-3">
                            <a href="PaginaCurso.html" class="btn">View videos</a>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-8 px-0 mb-3" style="width: 18rem;">
                    <img src="IMG/Machine.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Complete Machine Learning course</h5>
                        <p class="card-text">Learn the algorithms of Machine Learning with Python to become a Data
                            Science with all the code to use.</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <div class="botones text-center mt-3">
                            <a href="PaginaCurso.html" class="btn">View videos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <script src="<?php echo constant('URL'); ?>public/js/mainMycourse.js"></script>
</body>

</html>