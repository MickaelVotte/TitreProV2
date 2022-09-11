<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../controllers/controller_modifySubscribe.php';
include('../elements/header.php');
include('../elements/top.php');
?>




<div class=" bglogin row d-flex justify-content-center m-0 p-0">

    <form class="col-lg-4 col-sm-12 formulaire2" action="" method="post">
        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div class="text-center titleLogin">
                <p>Modifier votre compte</p>
            </div>
            <hr>

            <div>
                <label for="lastname"><span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="lastname" name="lastname" type="text" placeholder="Nom" required value="<?= $_POST['lastname'] ?? $infoUser['user_lastname'] ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="firstname"><span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="firstname" name="firstname" type="text" placeholder="Prénom " required value="<?= $_POST['firstname'] ?? $infoUser['user_firstname'] ?>"><i class="fa-regular fa-user "></i>
            </div>
            <div>
                <label for="age"><span class="text-danger"><?= isset($errors['age']) ? $errors['age'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="age" name="age" required placeholder="Age" type="number" min="18" max="99" value="<?= $_POST['age'] ?? $infoUser['user_age'] ?>"><i class="fa-regular fa-calendar-days"></i>
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input class="inputfield2" id="mail" name="mail" type="mail" required placeholder="Email"  value="<?= ($_POST['mail']) ?? $infoUser['user_mail'] ?>"><i class="fa-solid fa-envelope"></i>
            </div>



            <div class="m-5 d-flex justify-content-center text-center">
                <div >
                    <input type="hidden" name="idUser" value="<?= $infoUser['user_id'] ?>">
                    <button class="btn-login">Modifier</button>
                </div>
            </div>

            
            <div class="textLoginBottom">
                <p><a class="linkBottom" href="./home.php">Retounez à la page d'accueil </a>
                </p>
            </div>

    </form>

</div>





<?php include('../elements/footer.php') ?>