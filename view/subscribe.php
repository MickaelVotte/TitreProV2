<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>
<?php
include('../elements/top.php');
include('../elements/header.php');


?>




<div class="text-center m-5">

    <p>S'INSCRICRE</p>
</div>

<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div>
                <label for="lastname">Nom: <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input id="lastname" name="lastname" type="text" required value="<?= $_POST['lastname'] ?? '' ?>">
            </div>
            <div>
                <label for="firstname">Prénon: <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input id="firstname" name="firstname" type="text" required value="<?= $_POST['firstname'] ?? '' ?>">
            </div>
            <div>
                <label for="age">age: <span class="text-danger"><?= isset($errors['age']) ? $errors['age'] : '' ?></span></label>
                <br>
                <input id="age" name="age" type="number" min="18" max="99" required value="<?= $_POST['age'] ?? '' ?>">
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input id="mail" name="mail" type="mail" required value="<?= ($_POST['mail']) ?? '' ?>">
            </div>
            <div>
                <label for="password">Mot de Passe: <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input id="password" name="password" type="password" required value="<?= $_POST['address'] ?? '' ?>">
            </div>
            <div>
                <label for="ConfirmPassword"> Confirmer Mot de Passe: <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input id="ConfirmPassword" name="ConfirmPassword" type="password" required value="<?= $_POST['address'] ?? '' ?>">
            </div>


            <div class="m-5">
                <div>
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </div>


    </form>

</div>





<?php include('../elements/footer.php') ?>