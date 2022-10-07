<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre Nous</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/4cb0c25a26.js" crossorigin="anonymous"></script>

    <!-- //cdn sweet alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CDN librairie AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- CDN librairie  AOS  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- //feuille ce style -->
    <link rel="stylesheet" href="../assets/style/footer.css">
    <link rel="stylesheet" href="../assets/style/navbar.css">
    <link rel="stylesheet" href="../assets/style/login.css">
    <link rel="stylesheet" href="../assets/style/profil.css">
    <link rel="stylesheet" href="../assets/style/home.css">
    <link rel="stylesheet" href="../assets/style/courses.css">
    <link rel="stylesheet" href="../assets/style/calendar.css">
    <link rel="stylesheet" href="../assets/style/erreur.css">
</head>

<body class="d-flex flex-column min-vh-100 m-0 p-0">

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

                        <?php

                        if (isset($_SESSION['user']) && $_SESSION['user']['role_id_role'] == 1) { ?>
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



    <div class="bglogin5 row d-flex justify-content-center text-center m-0 p-0 min-vh-100">
       
        <p class="fs-2 text-white mt-5">C'est page n'existe pas</p>
    </div>

</body>


    <?php
    include('elements/footer.php');
    ?>