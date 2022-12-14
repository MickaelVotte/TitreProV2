<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
require_once '../controllers/controller_subscribe.php';
include('../elements/top.php');
include('../elements/header.php');

?>




<div class=" bglogin row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire2" action="" novalidate method="post">


        <div class="form-control text-center  shadow p-0 mb-5 bg-body rounded ">
            <div class="text-center titleLogin">
                <p>Créer un compte</p>
            </div>
            <hr>
            <div class="divInput">
                <label class="sr-only" for="lastname"></label><span id="errorLastname" class="text-danger "><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                <br>
                <input class="inputfield2" id="lastname" name="lastname" type="text" placeholder="Nom" onkeypress="deletemessageError('errorLastname')" required value="<?= $_POST['lastname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div class="divInput">
                <label for="firstname" class="sr-only"></label><span id="errorFirstname" class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                <br>
                <input class="inputfield2  " id="firstname" name="firstname" type="text" placeholder="Prénom" onkeypress="deletemessageError('errorFirstname')" required value="<?= $_POST['firstname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>


            <div class="divInput">
                <label for="pseudo" class="sr-only"></label><span id="errorPseudo" class="text-danger"><?= isset($errors['pseudo']) ? $errors['pseudo'] : '' ?></span>
                <br>
                <input class="inputfield2 " id="pseudo" name="pseudo" type="text" placeholder="Pseudo" onkeypress="deletemessageError('errorPseudo')" required value="<?= $_POST['pseudo'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>






            <div class="divInput">
                <label for="birthday" class="sr-only"></label><span id="errorBirthday" class="text-danger"><?= isset($errors['birthday']) ? $errors['birthday'] : '' ?></span>
                <br>
                <input class="inputfield2 " id="birthday" name="birthday" type="date" placeholder="Date de naissance" onkeypress="deletemessageError('errorBirthday')" required value="<?= $_POST['birthday'] ?? '' ?>"><i class="fa-regular fa-calendar-days"></i>
            </div>
            <div class="divInput">
                <label for="mail" class="sr-only"></label><span id="errorMail" class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span>
                <br>
                <input class="inputfield2" id="mail" name="mail" type="mail" placeholder="Email " onkeypress="deletemessageError('errorMail')" required value="<?= ($_POST['mail']) ?? '' ?>"><i class="fa-solid fa-envelope"></i>
            </div>


            <div class="divInput">
                <label for="password" class="sr-only"></label><span id="errorPassword" class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                <br>
                <input class="inputfield2" id="password" name="password" type="password" placeholder="Mot de passe " onkeypress="deletemessageError('errorPassword')" required value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>
            <div class="divInput">
                <label for="confirmPassword" class="sr-only"></label><span id="errorconfirmPassword" class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
                <br>
                <input class="inputfield2" id="confirmPassword" name="confirmPassword" type="password" required onkeypress="deletemessageError('errorconfirmPassword')" placeholder="Confirmer votre mot de passe " value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>

            <div class="mt-2 pb-2">
                <label name="cgu" id="cgu"><span id="errorCgu" class="text-danger"><?= isset($errors['cgu']) ? $errors['cgu'] : '' ?></span></label>
                <input class="text-decoration-underline" type="checkbox" name="cgu" id='cgu' onclick="deletemessageError('errorCgu')" value="<?= $_POST['cgu'] ?? '' ?>">J'accepte les conditions général d'utilisation <br> je certifie d'avoir plus de 15 ans</input>

            </div>


            <div class="m-3 d-flex justify-content-center text-center">
                <div>
                    <button class="btn-login">Valider</button>
                </div>
            </div>

            <div class="textLoginBottom">
                <p>Vous avez déja un compte? <a class="linkBottom" href="./login.php">Connectez-vous</a>
                </p>
            </div>
    </form>

</div>



<script src="../assets/script.js/myscript.js"></script>
<?php include('../elements/footer.php') ?>