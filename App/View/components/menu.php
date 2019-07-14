<div class="mainMenu d-flex align-items-center justify-content-between">
    <!-- Close Icon -->
    <div class="closeIcon">
        <i class="ti-close" aria-hidden="true"></i>
    </div>
    <!-- Logo Area -->
    <div class="logo-area">
    <?php
        
        if(App\Helper\Auth::check())
        {
             echo "<a href='index.html'>Bienvenido {$this->usuario->nombre}</a>";            
        }
        else {
            echo '<a href="index.html">Bienvenido, inicia sesion para utilizar el programa</a>';
        }
        ?>
    </div>
    <!-- Nav -->
    <div class="sonarNav wow fadeInUp" data-wow-delay="1s">
        <nav>
            <ul>
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-me.html">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portfolio.html">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                <?php if(App\Helper\Auth::check())
                {    
                    echo '<a class="nav-link" href="../login/logout">Cerrar sesion</a>';
                }else {
                    echo '<a class="nav-link" href="login">Iniciar sesion</a>';
                }?>
                </li>
            </ul>
        </nav>
    </div>
</div>