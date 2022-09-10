<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');

require_once '../controllers/controller_login.php';
?>


<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire" method="POST" action="">


        <div class="form-control text-center border border-primary shadow  bg-body rounded ">
            <div class="text-start text-center titleLogin">
                <p>Connexion</p>
            </div>
            <hr>
            <div class="">
                <label for="login"></label>
                <br>
                <input class="inputfield" type="text" id="login" name="login" placeholder="entrez votre email" value="<?= isset($errors['login']) ? $_POST['login'] : '' ?>"><i class="fa-solid fa-envelope"></i>
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
            </div>
            <div class="input2">
                <label for="password"></label>
                <br>
                <input class="inputfield" id="password" type="password" name="password" placeholder="entrez votre mot de passe" value="<?= isset($errors['password']) ? $_POST['password'] : '' ?>"><i class="fa-solid fa-key"></i>


                <br>
                <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
            </div>

            <div class="d-flex justify-content-center text-center">
                <span class="text-danger fst-italic default-span"><?= isset($errors['connection']) ? $errors['connection'] : '' ?></span>
                <button class="btn-login">Se connecter</button>
            </div>
            <small> <a class="d-flex justify-content-center m-5 text" href="./forgotPassword.php">mot de passe oubliée</a></small>
        </div>




    </form>
</div>









<?php include('../elements/footer.php') ?>