<?php session_start(); ?>
<?php
require_once "../controllers/controller_editEvent.php";

include('../elements/top.php');
include('../elements/header.php');

?>


<div class=" bglogin3 row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire3" action="" method="post" enctype="multipart/form-data" novalidate>



        <div class="form-control text-center  shadow p-0 mb-5 bg-body rounded ">
            <div class="text-center titleLogin">
                <p>Créer une course</p>
            </div>
            <hr>
            <div class="row justify-content-center">
                <img id="imgPreview" class="col-8 img-fluid" src="../assets/imageDefaut/imgdefault.jpg" alt="image_par_defaut_course_crée">
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="image"> <span class="text-danger"><?= isset($errors['image']) ? $errors['image'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="image" name="image" type="file" data placeholder="image"  required value="<?= $_POST['image'] ?? '' ?>">
                </div>
            </div>




            

            <div class="row">

                <div class="col-sm-6">
                    <label for="name"><span id='errorName'class="text-danger"><?= isset($errors['name']) ? $errors['name'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="name" name="name" type="text" placeholder="Nom de la course" onkeypress="deletemessageError('errorName')" required value="<?= $_POST['name'] ?? '' ?>">
                </div>
                <div class="col-sm-6">
                    <label for="place"><span id="errorPlace" class="text-danger"><?= isset($errors['place']) ? $errors['place'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="place" name="place" type="text" placeholder="lieu de la course" onkeypress="deletemessageError('errorPlace')" required value="<?= $_POST['place'] ?? '' ?>">
                </div>
                <div class="col-sm-6">
                    <label for="date"> <span id="errorDate" class="text-danger"><?= isset($errors['date']) ? $errors['date'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3 " id="date" name="date" type="date" placeholder="Date" onkeypress="deletemessageError('errorDate')" required value="<?= $_POST['date'] ?? '' ?>">
                </div>





                <div class="col-sm-6">
                    <label for="description"> <span id="errorDescription" class="text-danger"><?= isset($errors['description']) ? $errors['description'] : '' ?></span></label>
                    <br>
                    <textarea class="inputfield3" id="description" name="description" type="description" required placeholder="description" onkeypress="deletemessageError('errorDescription')"></textarea>
                </div>


                <div class="col-sm-6">
                    <label for="end"> <span class="text-danger"><?= isset($errors['end']) ? $errors['end'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="end" name="end" type="time" placeholder="l'heure de fin " required value="<?= ($_POST['end']) ?? '10:00' ?>">
                </div>

                <div class="col-sm-6">
                    <label for="nblimitParticipant"> <span id="errornblimitParticipant" class="text-danger"><?= isset($errors['nblimitParticipant']) ? $errors['nblimitParticipant'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="nblimitParticipant" name="nblimitParticipant" type="number" min="0" max="50" placeholder="nombre limite de participant " onkeypress="deletemessageError('errornblimitParticipant')" required value="<?= $_POST['nblimitParticipant'] ?? '' ?>">
                </div>

                <div class="col-sm-6">
                    <label for="start"> <span  class="text-danger"><?= isset($errors['start']) ? $errors['start'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3 " id="start" name="start" type="time" placeholder="l'heure de debut"  required value="<?= $_POST['start'] ?? '15:00' ?>">
                </div>



                <div class="col-sm-6">
                    <label for="departement"> <span id="departement" class="text-danger"><?= isset($errors['departement']) ? $errors['departement'] : '' ?></span></label>
                    <br>
                    <select class="inputfield3" id="department" name="departement" type="" onclick="deletemessageError('errorDepartement')" >

                        <option value="" selected disabled>Veuillez selectionner un departement</option>
                        <option value="1">Calvados</option>
                        <option value="2">Eure</option>
                        <option value="3">Manche</option>
                        <option value="4">Seine-maritimes</option>
                        <option value="5">Orne</option>
                </div>
                </select>
            </div>




            <div class="m-3 d-flex justify-content-center text-center">
                <div>
                    <button class="btn-login">Valider</button>
                </div>
            </div>

            <div class="textLoginBottom">
                <p> <a class="linkBottom" href="./home.php">Retournez à l'accueil</a>
                </p>
            </div>
        </div>
    </form>

</div>




<script src="../assets/script.js/myscript.js"></script>
<?php include('../elements/footer.php') ?>