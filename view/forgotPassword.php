<?php
session_start();
include('../elements/top.php');
include('../elements/header.php');
require_once  '../controllers/controller_forgotPassword.php';
?>



<div class=" bglogin2 row d-flex justify-content-center text-center m-0 p-0">
    <div class="text-center titleNameLogin text-white">
    <p>Mot de passe oublié</p>
</div>

<div class="text-center text-white">
    <p>Saisissez votre adresse e-mail ci-dessous pour réinitialiser votre mot de passe.</p>
</div>


<h3></h3>

<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-6 col-sm-12 formulaire" action="" method="POST">
        <div class="form-control text-center shadow  bg-body rounded ">
            <div>
                <label for="mail"></label>
                <br>
                <input class="inputfield2" type="text" name="mail" required placeholder="Entrez votre email" value="<?= isset($errors['mail']) ? $_POST['mail'] : '' ?>"><i class="fa-solid fa-envelope"></i>
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
            </div>

            <div class="d-flex justify-content-center mt-5 text-center">
                <input type="hidden" name="" value="<?= uniqid() ?>">
                <button class="mb-4 btn-login">Réinitialiser le mot de passe</button>
            </div>
        </div>
    </form>
</div>

</div>











<?php include('../elements/footer.php') ?>