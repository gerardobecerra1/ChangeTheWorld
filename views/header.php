<!-- Navbar comienzo -->
<nav class="navbar navbar-expand-md fixed-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="<?php echo constant('URL'); ?>Landing"><img src="<?php echo constant('URL'); ?>public/img/LogoB.png" class="logito" alt="Logo"
                style="width:200px;"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" data-scroll-nav="0" href="#"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scroll-nav="1" href="#"><i class="fas fa-list"></i> Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scroll-nav="2" href="#"><i class="fas fa-comments"></i> Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scroll-nav="3" href="#"><i class="fas fa-dollar-sign"></i> Prices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-scroll-nav="4" href="#"><i class="fas fa-phone-alt"></i> Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar Final -->