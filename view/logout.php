<?php

session_start();

require_once '../controllers/controller_logout.php'

?>


<?php include('../elements/top.php') ?>
<?php include('../elements/header.php') ?>


<div class="row m-0 p-0 logoutBox">

    <p class="fw-bolder fs-3">Vous  êtes bien déconnecté(e) </p>
    <a href="./home.php">Retour à la page d'accueil</a>

</div>


<?php include('../elements/footer.php') ?>