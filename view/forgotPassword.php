<?php  
session_start();
include ('../elements/top.php');
include('../elements/header.php'); 
require_once  '../controllers/controller_forgotPassword.php';
?>





<div class="text-center">
    <p>Mot de passe oublié</p>
</div>

    


    <h3></h3>

    <div class= "row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-6 col-sm-12" action="" method="POST">  
    <div>
        <label for="mail">Adresse mail</label>
        <br>
        <input type="text" name="mail" value="<?=isset($errors['mail']) ? $_POST['mail']: ''?>">
        <br>
        <span class="text-danger fst-italic"><?=isset($errors['mail']) ? $errors ['mail']: '' ?></span>
    </div>

    <div>
        <input type="hidden" name="" value="<?= uniqid() ?>">
        <button>Valider</button>
    </div>

    </form>


    </div>

    






 <?php include('../elements/footer.php') ?>

