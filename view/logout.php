<?php

session_start();

require_once '../controllers/controller_logout.php'

?>


<?php include('../elements/top.php') ?>
<?php include('../elements/header.php') ?>


<div class="row m-0 p-0 bglogin3">
    <div class="col-12 m-0 p-0 ">
        <div class="formulaire5 ">
            <div class="text-center mt-5 m-0 p-0">
                <p class="fw-bolder fs-3">Vous êtes bien déconnecté(e) </p>
            <a class="textLoginBottom" href="./home.php">Retour à la page d'accueil</a>
            </div>
            
        </div>

    </div>


</div>


<?php include('../elements/footer.php') ?>