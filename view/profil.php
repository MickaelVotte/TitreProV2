<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>



<?php
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/User.php';
require_once '../controllers/controller_profil.php';
include('../elements/top.php');
include('../elements/header.php');

?>


<div class="sectionProfil row m-0 p-0 d-flex justify-content-evenly">


    <div class="banner-image5">
        <div class="text-center  titleLogin text-white fs-1">
            <p>Mon compte</p>
          
        </div>
    </div>




    <div class="wrapperProfil">

        <div class="containerProfil ">
            <i class="logoProfil fa-sharp fa-solid fa-calendar-check"></i></i>
            <span class="textProfil">Course crée</span>
            <span class="num"><?=$totalEvent['totalEvent']?></span>
            
        </div>

        <div class="containerProfil">
            <i class="logoProfil  fa-solid fa-person-running "></i>
            <span class="textProfil">Total parcouru</span>
            <span class="num" ><?=$totalKm['totalKm']?>Km</span>
        </div>

        <div class="containerProfil">
            <i class="logoProfil  fa-regular fa-user "></i>
            <span class="textProfil">Profil</span>
            <span class="num" data-val="400"></span>
            <div class="text-center m-0 p-0">
                <p><a class="linkProfil" href="../view/modifySubcribe.php?id=<?= $_SESSION['user']['user_id'] ?>">Modifier votre compte</a></p>
            
                <p><a class="linkProfil" href="../view/courseInscritProfil.php?id=<?= $_SESSION['user']['user_id'] ?>">Historique des courses</a></p>

            
                <p><a class="linkProfil text-danger" href="./closeAccount.php">supprimer votre compte</a></p>
            </div>

        </div>


    </div>

</div>








<?php include('../elements/footer.php') ?>