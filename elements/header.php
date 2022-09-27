<?php

include('../elements/top.php');


?>



<header>




    <nav class="navbar navbar-expand-lg navbarCss">
        <div class="container-fluid">

            <a class="navbar-brand text-white" href="#">Running Race</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <div class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="../view/home.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="../view/courses.php">Courses</a>
                    </li>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="../view/event.php">Organiser un évènement</a>
                        </li>
                    <?php } else { ?>
                        <li><a href=""></a></li>
                    <?php } ?>
                 
                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="../view/logout.php">Deconnexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="/view/profil.php"><?= isset($_SESSION['user']) ? $_SESSION['user']['user_firstname'] : "Profil"  ?></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="../view/subscribe.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="../view/login.php">Connexion</a>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['user']['user_firstname']) == 4) { ?>
                        <li class="nav-link">
                            <a class="nav-link active text-white" href="../view/admin.php">Admin</a>
                        </li>
                        <?php } else { ?>
                        <li><a href=""></a></li>
                    <?php } ?>
                 


                </div>
            </div>
    </nav>




</header>