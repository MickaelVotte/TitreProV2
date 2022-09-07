<?php
//cela permet d'utiliser les variables de session: $_session
session_start(); ?>



<?php
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/User.php';
include('../elements/top.php');
include('../elements/header.php');


var_dump($_SESSION);
?>



<div class="text-center m-5">
    <p>Mon compte</p>
</div>

<div class="row m-0 p-0">
    <div class="col-lg-4 col-sm-12 text-center">
        <p>course inscrit</p>
    </div>
    <div class="col-lg-4 col-sm-12 text-center">
        <p>course Organiser</p>
    </div>
    <div class="col-lg-4 col-sm-12 text-center">
        <p>Mon profil</p>
        <p><a href="../view/modifySubcribe.php?id=<?=$_SESSION['user']['user_id']?>">Modifier votre compte</a></p>
    </div>

</div>






<?php include('../elements/footer.php') ?>