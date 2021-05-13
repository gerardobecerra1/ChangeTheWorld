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
    <!-- main css -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styleCourse.css">
    <title>CTW | Curso</title>
</head>
<body>
    
    <!-- Navbar comienzo -->
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" id="img-logo" href="<?php echo constant('URL'); ?>Landing"><img src="<?php echo constant('URL'); ?>public/img/LogoB.png" alt="Logo" style="width:200px;"></a>
            <a class="navbar-brand" id="text-course" href="#"><img src="<?php echo constant('URL'); ?>public/img/MachineLearn.svg" alt="Logo" style="width:55px;"> Complete Machine Learning course</a>
    
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
                        <a class="nav-link" data-scroll-nav="2" href="#"><i class="fas fa-newspaper"></i> Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="3" href="#"><i class="fas fa-comments"></i> Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-scroll-nav="4" href="#"> <i class="fas fa-phone-alt"></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><img src="IMG/avatar_opt.jpg" alt="" style="border-radius: 50%; width: 30px;">
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
                <ul class="navbar-nav ml-auto" id="navbar-nav-course">
                    <li class="nav-item">
                        <a href="#" class="btn btn-2">Buy for $499</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar Final -->

    <!-- Home Inicio -->
    <section class="home d-flex align-items-center" id="home" data-scroll-index="0" >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="home-text">
                        <h1>Complete Machine Learning course</h1>
                        <p>Learn the algorithms of Machine Learning with Python to become a Data Science with all the code to use.</p>
                        <div class="section-rating">
                           <span>3.5</span>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star-half-alt"></i>
                           <i class="far fa-star"></i>
                           
                           <h3>20.000 Usuarios</h3>
                        </div>
                        
                        <div class="sign-up-btn">
                            <a href="#" class="btn btn-1">Buy for $499</a>
                        </div>                   
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="home-img">
                        <img src="<?php echo constant('URL'); ?>public/img/MachineLearn.svg" alt="">
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
                        <div class="accordion-item" >
                            <div class="accordion-header" data-toggle="collapse" data-target="#collapse-01">
                                <h3>Introduction</h3>
                                <h3>3 videos</h3>
                            </div>
                            <div class="collapse show" id="collapse-01" data-parent="#accordion">
                                <div class="accordion-body">
                                    <a href="<?php echo constant('URL'); ?>Videos"><i class="fas fa-play-circle"></i> Introduction</a>
                                </div>
                                <div class="accordion-body ">
                                    <a href="#"><i class="fas fa-play-circle"></i> Course prerequisites</a>
                                </div>
                                <div class="accordion-body">
                                    <a href="#"><i class="fas fa-play-circle"></i> Meet the instructor</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                                <h3>Basic</h3>
                                <h3>1 videos</h3>
                            </div>
                            <div class="collapse" id="collapse-02" data-parent="#accordion">
                                <div class="accordion-body">
                                    <a href="#"><i class="fas fa-play-circle"></i> Course video title</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                                <h3>Medium</h3>
                                <h3>1 videos</h3>
                            </div>
                            <div class="collapse" id="collapse-03" data-parent="#accordion">
                                <div class="accordion-body">
                                    <a href="#"><i class="fas fa-play-circle"></i> Course video title</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-04">
                                <h3>Advanced</h3>
                                <h3>1 videos</h3>
                            </div>
                            <div class="collapse" id="collapse-04" data-parent="#accordion">
                                <div class="accordion-body">
                                    <a href="#"><i class="fas fa-play-circle"></i> Course video title</a>
                                </div>
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
                    <p>Do the words Machine Learning or Data Scientist sound familiar to you? Are you curious about what these techniques are for or why companies around the world pay a salary of $ 120,000 to $ 200,000 a year to a data scientist?</p>
                    <p>We will see step by step how to start working with concepts and algorithms from the world of Machine Learning. With each new class and section that you complete, you will have new skills that will help you understand this world so complete and lucrative that this branch of Data Science can be.</p>
                    <p>Also tell you that this course is very fun, in the vein of Juan Gabriel Gomila and that you will learn and have fun while you are learning about Machine Learning techniques with Python. In particular, the topics that we will work on will be the following:</p>
                    <ul class="description-list ">
                        <li>
                            <p>Part 1 - Python installation and necessary packages for data science, machine learning and data visualization</p>
                        </li>
                        <li>
                            <p>Part 2 - Historical evolution of predictive analytics and machine learning</p>
                        </li>
                        <li>
                            <p>Part 3 - Pre-processing and cleaning the data</p>
                        </li>
                    </ul>
                    <h4>Who is this course for?</h4>
                    <ul class="description-list ">
                        <li>
                            <p>Anyone interested in learning Machine Learning</p>
                        </li>
                        <li>
                            <p>Students who have a knowledge of mathematics who want to learn about Machine Learning with Python</p>
                        </li>
                        <li>
                            <p>Intermediate users who know the fundamentals of Machine learning such as classical linear or logistic regression algorithms but are looking to learn more and explore other fields of statistical learning</p>
                        </li>
                    </ul>
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
                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="instructor-title">
                        <h1 class="name">Luis Gerardo Becerra Jiménez</h1>
                        <h3 class="subtitle">CEO of BecerraGames, LMAD, Data Scientist & Game Designer</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-star"></i> Instructor Rating: 4.6</li>
                        <li><i class="fas fa-award"></i> 42,832 reviews</li>
                        <li><i class="fas fa-users"></i> 123,456 students</li>
                        <li><i class="fas fa-play-circle"></i> 4 courses</li>
                    </ul>
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
                    <form action="" class="form-comments d-flex justify-content-end flex-wrap">
                        <textarea name="" id="" placeholder="Write a comment"></textarea>
                        <a href="#" class="btn btn-comment">comment</a>
                    </form>

                    <div class="media">
                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">
                    
                        <div class="media-body">
                            <p class="name">Alberto Daniel Henández Villanueva<span>11:30am, hoy</span></p>
                            <p class="user-comment">
                                The course is very good, you learn a lot but you also need to study a 
                                lot. The teacher shows that he knows, sometimes too much! and he also knows how to transmit 
                                it. Constructively, the requirement is high school math, but that's not enough to take 
                                advantage of this course.
                            </p> 
                            <div class="buttons text-right">
                                <a href="#">Answer</a>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                            </div>

                            <div class="media">
                                <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">
                            
                                <div class="media-body">
                                    <p class="name">Luis Gerardo Becerra Jiménez<span>11:42am, hoy</span></p>
                                    <p class="user-comment">
                                        Hi Daniel, thank you very much for leaving us your comment. 
                                        He receives my regards.
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

                    <div class="media">
                        <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">
                    
                        <div class="media-body">
                            <p class="name">Edgar Donato Calvillo Lumbreras<span>11:42am, hoy</span></p>
                            <p class="user-comment">
                                Very good course, very well explained and you have forced me to 
                                remember a lot about the statistics of the race but on the other hand it has forced me 
                                to learn. Thanks. The course contains many explanations, some of them theoretical but 
                                necessary to understand the practical part. Better focused than even in college. Overall 
                                10 out of 10. I recommend this course to anyone who wants to delve into the world of 
                                machine learning and get to know Python in depth.
                            </p> 
                            <div class="buttons text-right">
                                <a href="#">Answer</a>
                                <a href="#">Edit</a>
                                <a href="#">Delete</a>
                            </div>
                            
                            <div class="media">
                                <img src="<?php echo constant('URL'); ?>public/img/avatar_opt.jpg" width="74" height="74" alt="">
                            
                                <div class="media-body">
                                    <p class="name">Luis Gerardo Becerra Jiménez<span>11:42am, hoy</span></p>
                                    <p class="user-comment">
                                        Hi Donato, thank you for sharing your experience with this course. How good that 
                                        you have been able to refresh all that knowledge, greetings.
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
                    <p>We are a company that is dedicated to giving the opportunity to learn and earn money doing what you like.</p>
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
    <!-- main js -->
    <script src="<?php echo constant('URL'); ?>public/js/mainCourse.js"></script>
</body>
</html>