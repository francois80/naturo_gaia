<!--Navbar-->
<nav class="row navbar navbar-expand-lg navbar-dark bg-green sticky-top">
    <!-- Collapse button -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span> Natur'O Gaïa</button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <!-- Links -->
        <ul class="navbar-nav mr-auto  mt-2 mt-md-0">
            <li class="nav-item"><a class="nav-link" href="home.php">Accueil</a></li>
            <li class="nav-item"><span id="pipe-bar" class="nav-link">|</span></li>
            <li class="nav-item"><a class="nav-link" href="naturo.php">Naturopathie</a></li>
            <li class="nav-item"><a class="nav-link" href="aroma.php">Aromathérapie</a></li>
            <li class="nav-item"><a class="nav-link" href="iridologie.php">Iridologie</a></li>
            <li class="nav-item"><a class="nav-link" href="massage.php">Massage</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="calendrier.php">Calendrier</a></li>
        </ul>
        <ul class="navbar-nav mr-auto">
            <?php if (!isset($_SESSION['auth']['login'])) { ?>
                <li class="nav-item"><a href="register.php" class="nav-link">Inscription</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Connexion</a></li>
            <?php } else { ?>
                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" href="">Bonjour <?= ucfirst(strip_tags($_SESSION['auth']['lastname']))[0] ?> </a>                       
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i></a>                       
                </li>
            <?php } ?>
        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->
</nav>
<!--/.Navbar-->