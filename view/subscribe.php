<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');

require_once '../controllers/controller_subscribe.php'
?>




<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">
            <div class="text-center titleLogin">

                <p>S'INSCRICRE</p>
            </div>
            <hr>
            <div>
                <label for="lastname"><span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="lastname" name="lastname" type="text" placeholder="Entrez votre nom" value="<?= $_POST['lastname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="firstname"> <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input class="inputfield2 " id="firstname" name="firstname" type="text" placeholder="Entrez votre prénom " value="<?= $_POST['firstname'] ?? '' ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="age"> <span class="text-danger"><?= isset($errors['age']) ? $errors['age'] : '' ?></span></label>
                <br>
                <input class="inputfield2 " id="age" name="age" type="number" min="18" max="99" placeholder="Entrez votre age " value="<?= $_POST['age'] ?? '' ?>"><i class="fa-regular fa-calendar-days"></i>
            </div>
            <div>
                <label for="mail"> <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="mail" name="mail" type="mail" placeholder="Entrez votre email " value="<?= ($_POST['mail']) ?? '' ?>"><i class="fa-solid fa-envelope"></i>
            </div>
            <div>
                <label for="password"> <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="password" name="password" type="password" placeholder="Entrez votre mot de passe " value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>
            <div>
                <label for="confirmPassword"> <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirmer votre mot de passe " value="<?= $_POST['address'] ?? '' ?>"><i class="fa-solid fa-key"></i>
            </div>
            <div class="mt-3 pt-3">
                <label name="cgu" id="cgu"><span class="text-danger"><?= isset($errors['cgu']) ? $errors['cgu'] : '' ?></span></label>
                <input type="checkbox" name="cgu" id='cgu' value="<?= $_POST['cgu'] ?? '' ?>">J'accepte les conditions général d'utilisation</input>

            </div>


            <div class="m-5 d-flex justify-content-center text-center">
                <div>
                    <button class="btn-login">Valider</button>
                </div>
            </div>


    </form>

</div>





<?php include('../elements/footer.php') ?>