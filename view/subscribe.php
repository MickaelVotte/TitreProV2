<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');

require_once '../controllers/controller_subscribe.php'
?>




<div class=" bglogin row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire2" action="" method="post">


        <div class="form-control text-center  shadow p-0 mb-5 bg-body rounded ">
            <div class="text-center titleLogin">

                <p>Créer un compte</p>
            </div>
            <hr>
            <div>
                <label for="lastname"><span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="lastname" name="lastname" type="text" placeholder="Nom" required value="<?= $_POST['lastname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="firstname"> <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input class="inputfield2 " id="firstname" name="firstname" type="text" placeholder="Prénom " required value="<?= $_POST['firstname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="age"> <span class="text-danger"><?= isset($errors['age']) ? $errors['age'] : '' ?></span></label>
                <br>
                <input class="inputfield2 " id="age" name="age" type="number" min="18" max="99" placeholder="Age " required value="<?= $_POST['age'] ?? '' ?>"><i class="fa-regular fa-calendar-days"></i>
            </div>
            <div>
                <label for="mail"> <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="mail" name="mail" type="mail" placeholder="Email " required value="<?= ($_POST['mail']) ?? '' ?>"><i class="fa-solid fa-envelope"></i>
            </div>
            <div>
                <label for="password"> <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="password" name="password" type="password" placeholder="Mot de passe " required value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>
            <div>
                <label for="confirmPassword"> <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="confirmPassword" name="confirmPassword" type="password" required placeholder="Confirmer votre mot de passe " value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>
            <div class="mt-2 pb-2">
                <label name="cgu" id="cgu"><span class="text-danger"><?= isset($errors['cgu']) ? $errors['cgu'] : '' ?></span></label>
                <input type="checkbox" name="cgu" id='cgu' value="<?= $_POST['cgu'] ?? '' ?>">J'accepte les conditions général d'utilisation</input>

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





<?php include('../elements/footer.php') ?>