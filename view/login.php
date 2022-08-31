<?php
//cela permet d'utiliser les variables de session: $_session
session_start();?>
<?php
include ('../elements/top.php');
include('../elements/header.php'); 

require_once '../controllers/controller_login.php';
?>


<div class="text-center m-5">

    <p>CONNEXION</p> 

</div>

<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" method="POST" action="">

        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">
            <div class="mt-5 mb-2">
                <label for="login">identifiant:</label>
                <br>
                <input type="text" id="login" name="login"  value="<?= isset($errors['login']) ? $_POST['login'] : '' ?>">
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['login']) ? $errors ['login'] : '' ?></span>
            </div>
            <div class="mt-2 mb-2">
                <label for="password">Mot de passe:</label>
                <br>
                <input id="password" type="password" name="password" value="<?= isset($errors['password']) ? $_POST['password']: '' ?>">
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors ['password'] : '' ?></span>
            </div>

            <div class="text-center d-flex flex-column">
                <span class="text-danger fst-italic default-span"><?= isset($errors['connection']) ? $errors['connection'] : '' ?></span>
                <button class="btn btn-primary">Se connecter</button>
            </div>
            </div>
        </div>
    
        
    </form>
    <div>
        <small> <a class="d-flex justify-content-center m-5" href="">mot de passe oubliée</a></small>

    </div>
</div>








<?php include('../elements/footer.php') ?>