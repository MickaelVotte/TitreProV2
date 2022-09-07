<?php
include('../elements/top.php')

?>



<header>


    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../view/home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Organiser un évènement</a>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            paramètres
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../view/subscribe.php">s'incrire</a></li>
                            <li><a class="dropdown-item" href="../view/login.php">connexion</a></li>
                            <li><a class="dropdown-item" href="#">deconnexion</a></li>
                            <li><a class="dropdown-item" href="/view/profil.php">Profil</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   



</header>