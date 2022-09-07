
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




<div class="text-center m-5">

    <p>MODIFIER VOTRE COMPTE</p>
</div>

<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div>
                <label for="lastname">Nom: <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input id="lastname" name="lastname" type="text"  value="<?= $_POST['lastname'] ?? $infoUser['user_lastname'] ?>">
            </div>
            <div>
                <label for="firstname">Préno: <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input id="firstname" name="firstname" type="text"  value="<?= $_POST['firstname'] ?? $infoUser['user_firstname'] ?>">
            </div>
            <div>
                <label for="age">age: <span class="text-danger"><?= isset($errors['age']) ? $errors['age'] : '' ?></span></label>
                <br>
                <input id="age" name="age" type="number" min="18" max="99"  value="<?= $_POST['age'] ?? $infoUser['user_age'] ?>">
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input id="mail" name="mail" type="mail"  value="<?= ($_POST['mail']) ?? $infoUser['user_mail'] ?>">
            </div>
         


            <div class="m-5">
                <div>
                    <input type="hidden" name="idUser" value="<?= $infoUser['user_id'] ?>">
                    <button class="btn btn-success">Modifier</button>
                </div>
            </div>

         
    </form>

</div>





<?php include('../elements/footer.php') ?>

