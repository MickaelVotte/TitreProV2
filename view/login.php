<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');

require_once '../controllers/controller_login.php';
?>


<section class=" bglogin row d-flex justify-content-center text-center m-0 p-0">

    <div class="text-center text-white titleNameLogin">
        Running Race
    </div>


    <form class="col-lg-4 col-sm-12 formulaire" method="POST" action="">

        <div class="form-control text-center shadow  bg-body rounded ">
            <div class="text-start text-center titleLogin">
                <p>Connexion</p>
            </div>
            <hr>
            <span class="text-danger fst-italic default-span"><?= isset($errors['connection']) ? $errors['connection'] : '' ?></span>
            <div class="">
                <label for="login"></label>
                <br>
                <input class="inputfield" type="text" id="login" name="login" placeholder="Entrez votre email" required value="<?= isset($errors['login']) ? $_POST['login'] : '' ?>"><i class="fa-solid fa-envelope"></i>
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['login']) ? $errors['login'] : '' ?></span>
            </div>
            <div class="input2">
                <label for="password"></label>
                <br>
                <input class="inputfield" id="password" type="password" name="password" required placeholder="Entrez votre mot de passe" value="<?= isset($errors['password']) ? $_POST['password'] : '' ?>"><i class="fa-solid fa-key"></i>


                <br>
                <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
            </div>
            <small class="forgotPw"> <a class=" m-0 p-0 text" href="./forgotPassword.php">Mot de passe oublié?</a></small>
            
            <div class="d-flex justify-content-center mt-5 text-center">
                <button class="btn-login">Se connecter</button>
            </div>
            <div class="textLoginBottom">
                <p>Vous n'avez pas de compte? <a class="linkBottom" title="créer un compte" href="./subscribe.php">Créer un compte</a></p>
            </div>
        </div>




    </form>




</section>











<?php include('../elements/footer.php') ?>