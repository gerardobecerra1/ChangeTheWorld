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
    <!-- video css -->
    <!--  <link rel="stylesheet" href="https://cdn.plyr.io/3.6.3/plyr.css"> -->
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styleVideos.css">
    <title>CTW | Video</title>
</head>

<body>
    <!-- Navbar Inicio -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" id="img-logo" href="<?php echo constant('URL'); ?>Landing"><img src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt="Logo"
                    style="width:200px;"></a>
            <a class="navbar-brand" id="text-course" href="#">Introduction</a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto" id="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" data-scroll-nav="0" href="#">Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="1" href="#">Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="2" href="#">Recommended</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" href="#"><img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" alt=""
                                    style="border-radius: 50%; width: 30px;">
                                Username
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>Usuario">Account settings</a>
                                <a class="dropdown-item" href="<?php echo constant('URL'); ?>Mycourse">My courses</a>
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

    <!-- Home Inicio -->
    <section class="home d-flex align-items-center" id="home" data-scroll-index="0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="video">
                        <video id="player" class="viendo" playsinline controls data-poster="/path/to/poster.jpg">
                            <source src="<?php echo constant('URL'); ?>public/img/Thanos-Bailando-720.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
                <div class="home-text">
                    <h1>Introduction</h1>
                    <p>In this instruction you will see all the topics of the course, how is the instructor and with
                        what tools we will work.</p>
                </div>
            </div>
    </section>
    <!-- Home Final -->

    <!-- Cosas de curso Inicio -->
    <section class="things pt-3" data-scroll-index="1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Content <span>Course</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-notes"
                            role="tab" aria-controls="nav-notes" aria-selected="true">Notes</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-questions"
                            role="tab" aria-controls="nav-questions" aria-selected="false">Questions</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-notes" role="tabpanel"
                        aria-labelledby="nav-notes-tab">
                        <!-- Notes Inicio -->
                        <section class="questions" id="questions" data-scroll-index="3">
                            <div class="row questions-box justify-content-center">
                                <div class="col-lg-10">
                                    <form action="" class="form-questions d-flex justify-content-end flex-wrap">
                                        <textarea name="" id="" placeholder="Write a note"></textarea>
                                        <a href="#" class="btn btn-question">Send Note</a>
                                    </form>

                                    <div class="media">
                                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">

                                        <div class="media-body">
                                            <p class="name">Alberto Daniel Henández Villanueva<span>11:30am, hoy</span>
                                            </p>
                                            <p class="user-question">
                                                The interactivity would be the visual part or what they call the view
                                                model, which is finally what the user manipulates, or what we allow the
                                                user to see, and the programming is the directives or engines that move
                                                that interactivity, it seems simple but I think it is a little more
                                                complex depending on the scope we give it.
                                            </p>
                                            <div class="buttons text-right">
                                                <a href="#">Answer</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Delete</a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="media">
                                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">

                                        <div class="media-body">
                                            <p class="name">Edgar Donato Calvillo Lumbreras<span>11:30am, hoy</span></p>
                                            <p class="user-question">
                                                The interactivity would be the visual part or what they call the view
                                                model, which is finally what the user manipulates, or what we allow the
                                                user to see, and the programming is the directives or engines that move
                                                that interactivity, it seems simple but I think it is a little more
                                                complex depending on the scope we give it.
                                            </p>
                                            <div class="buttons text-right">
                                                <a href="#">Answer</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Delete</a>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                        <!-- Notes Final -->
                    </div>
                    <div class="tab-pane fade" id="nav-questions" role="tabpanel" aria-labelledby="nav-questions-tab">
                        <!-- Questions Inicio -->
                        <section class="questions" id="questions" data-scroll-index="3">
                            <div class="row questions-box justify-content-center">
                                <div class="col-lg-10">
                                    <form action="" class="form-questions d-flex justify-content-end flex-wrap">
                                        <textarea name="" id="" placeholder="Write a question"></textarea>
                                        <a href="#" class="btn btn-question">Send question</a>
                                    </form>

                                    <div class="media">
                                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">

                                        <div class="media-body">
                                            <p class="name">Alberto Daniel Henández Villanueva<span>11:30am, hoy</span>
                                            </p>
                                            <p class="user-question">
                                                Good afternoon, I want to know if with these bases I will be able to
                                                apply it to VB excel ?, thanks
                                            </p>
                                            <div class="buttons text-right">
                                                <p>
                                                    <a data-toggle="collapse" href="#collapseAnswer"
                                                        aria-expanded="false" aria-controls="collapseAnswer">
                                                        Answer
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseAnswer">
                                                    <form action=""
                                                        class="form-questions d-flex justify-content-end flex-wrap">
                                                        <textarea name="" id=""
                                                            placeholder="Write a question"></textarea>
                                                        <a href="#" class="btn btn-question">Send question</a>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="media">
                                                <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74"
                                                    alt="">

                                                <div class="media-body">
                                                    <p class="name">Luis Gerardo Becerra Jiménez<span>11:42am,
                                                            hoy</span></p>
                                                    <p class="user-question">
                                                        Hello! As such, the programming logic will help you to apply it
                                                        to
                                                        Visual Basic in Excel, however, the syntax will not, since the
                                                        syntax of Visual Basic and JavaScript are very different, and
                                                        also
                                                        the objectives of each language of programming are different.
                                                    </p>
                                                    <div class="buttons text-right">
                                                        <p>
                                                            <a data-toggle="collapse" href="#collapseComment"
                                                                aria-expanded="false" aria-controls="collapseComment">
                                                                Answer
                                                            </a>
                                                        </p>
                                                        <div class="collapse" id="collapseComment">
                                                            <form action=""
                                                                class="form-questions d-flex justify-content-end flex-wrap">
                                                                <textarea name="" id=""
                                                                    placeholder="Write a question"></textarea>
                                                                <a href="#" class="btn btn-question">Send question</a>
                                                            </form>
                                                        </div>
                                                        <!-- <a href="#">Edit</a>
                                                        <a href="#">Delete</a> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="media">
                                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">

                                        <div class="media-body">
                                            <p class="name">Edgar Donato Calvillo Lumbreras<span>11:42am, hoy</span></p>
                                            <p class="user-question">
                                                Is it easier to learn html css and javascript separately or together?
                                            </p>
                                            <div class="buttons text-right">
                                                <p>
                                                    <a data-toggle="collapse" href="#collapseAnswer2"
                                                        aria-expanded="false" aria-controls="collapseAnswer2">
                                                        Answer
                                                    </a>
                                                </p>
                                                <div class="collapse" id="collapseAnswer2">
                                                    <form action=""
                                                        class="form-questions d-flex justify-content-end flex-wrap">
                                                        <textarea name="" id=""
                                                            placeholder="Write a question"></textarea>
                                                        <a href="#" class="btn btn-question">Send question</a>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="media">
                                                <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74"
                                                    alt="">

                                                <div class="media-body">
                                                    <p class="name">Luis Gerardo Becerra Jiménez<span>11:42am,
                                                            hoy</span></p>
                                                    <p class="user-question">
                                                        One thing at a time 😃 I would recommend you follow the Web
                                                        Development School route, starting with HTML, followed by CSS
                                                        and
                                                        then JS. Greetings!
                                                    </p>
                                                    <div class="buttons text-right">
                                                        <p>
                                                            <a data-toggle="collapse" href="#collapseComment2"
                                                                aria-expanded="false" aria-controls="collapseComment2">
                                                                Answer
                                                            </a>
                                                        </p>
                                                        <div class="collapse" id="collapseComment2">
                                                            <form action=""
                                                                class="form-questions d-flex justify-content-end flex-wrap">
                                                                <textarea name="" id=""
                                                                    placeholder="Write a question"></textarea>
                                                                <a href="#" class="btn btn-question">Send question</a>
                                                            </form>
                                                        </div>
                                                        <!-- <a href="#">Edit</a>
                                                        <a href="#">Delete</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Questions Final -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cosas de curso Final -->

    <section class="courses section-padding" data-scroll-index="2" id="courses">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h2>Recommended <span>Courses</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel courses-carousel">
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/algebra.jpg" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <h5 class="card-title">Complete Linear Algebra Course from Zero to Expert</h5>
                                <p class="card-text">Learn the basics to apply linear algebra to Statistics, Machine
                                    Learning and Artificial Intelligence</p>
                                <div class="botones text-center">
                                    <a href="<?php echo constant('URL'); ?>Curso" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/Unreal.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Master Unreal Engine 4 Game Development with Blueprints</h5>
                                <p class="card-text">Learn to create AAA Videogames FROM SCRATCH, complete development
                                    and programming with Blueprints and Unreal</p>
                                <div class="botones text-center">
                                    <a href="<?php echo constant('URL'); ?>Curso" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/deeplearn.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Deep Learning: Neural Networks in Python from Scratch</h5>
                                <p class="card-text">Learn how to create deep learning algorithms in Python with machine
                                    learning and data science experts</p>
                                <div class="botones text-center">
                                    <a href="<?php echo constant('URL'); ?>Curso" class="btn">View content</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="courses-item">
                        <div class="card" style="width: 20rem;">
                            <img src="<?php echo constant('URL'); ?>public/img/blender.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Character sculpture with Blender 2.91</h5>
                                <p class="card-text">Learn everything you need to create 3D characters with Blender's
                                    sculpture mode tools</p>
                                <div class="botones text-center">
                                    <a href="<?php echo constant('URL'); ?>Curso" class="btn">View content</a>
                                </div>
                            </div>
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
    <!-- Video js -->
    <!-- <script src="https://cdn.plyr.io/3.6.3/plyr.polyfilled.js"></script> -->
    <!-- main js -->
    <script src="<?php echo constant('URL'); ?>public/js/mainVideos.js"></script>
</body>

</html>