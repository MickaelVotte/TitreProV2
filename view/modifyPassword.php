
<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../controllers/controller_modifyPassword.php';
include('../elements/header.php');
include('../elements/top.php');
?>






<div class="text-center m-5">

    <p>MODIFIER VOTRE MOT DE PASSE</p>
</div>

<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">



        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div>
                <label for="newPassword">nouveau mot de passe: <span class="text-danger"><?= isset($errors['newPassword']) ? $errors['newPassword'] : '' ?></span></label>
                <br>
                <input id="newPassword" name="newPassword" type="password"  value="<?= $_POST['newPassword'] ?? "" ?>">
            </div>
            <div>
                <label for="newConfirmPassword">Confirmer votre nouveau mot de passe: <span class="text-danger"><?= isset($errors['newConfirmPassword']) ? $errors['newConfirmPassword'] : '' ?></span></label>
                <br>
                <input id="newConfirmPassword" name="newConfirmPassword" type="password"  value="<?= $_POST['newConfirmPassword'] ?? "" ?>">
            </div>
           
         


            <div class="m-5">
                <div>
                    <button class="btn btn-success">Modifier</button>
                </div>
            </div>

         
    </form>

</div>













<?php include('../elements/footer.php') ?>

