<?php

session_start();

require_once '../controllers/controller_logout.php'

?>


<?php include('../elements/top.php') ?>
<?php include('../elements/header.php') ?>

<div class="mt-5 text-center">
    <p>Vous vous êtes bien déconnecté(e)</p>
</div>
<div class="text-center">
    <a href="./home.php">Retour à la page d'accueil</a>
</div>

<?php include('../elements/footer.php') ?>