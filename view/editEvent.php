<?php session_start(); ?>
<?php
require_once "../controllers/controller_editEvent.php";
require_once '../controllers/controller_calendar.php';
require_once '../controllers/controller_home.php';



include('../elements/top.php');
include('../elements/header.php')
?>

<div class=" bglogin3 row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire3" action="" method="post" enctype="multipart/form-data">



        <div class="form-control text-center  shadow p-0 mb-5 bg-body rounded ">
            <div class="text-center titleLogin">
                <p class="comments2">Créer une course</p>
            </div>

            <div class="row justify-content-center">
                <img id="imgPreview" class="col-8 img-fluid imgPreview" src="../assets/imageDefaut/imgdefault.png" alt="image_par_defaut_course_crée">
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="image" class="sr-only"> </label><span class="text-danger"><?= isset($errors['image']) ? $errors['image'] : '' ?></span>
                    <br>
                    <input class="inputfield3" id="image" name="image" type="file" data placeholder="image" value="<?= $_POST['image'] ?? '' ?>">
                </div>
            </div>






            <div class="row">

                <div class="col-sm-6">
                    <label for="name" class="sr-only"></label><span id='errorName' class="text-danger"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
                    <br>
                    <input class="inputfield3" id="name" name="name" type="text" placeholder="Nom de la course" onkeypress="deletemessageError('errorName')" required value="<?= $_POST['name'] ?? '' ?>">
                </div>
                <div class="col-sm-6">
                    <label for="place" class="sr-only"></label><span id="errorPlace" class="text-danger"><?= isset($errors['place']) ? $errors['place'] : '' ?></span>
                    <br>
                    <input class="inputfield3" id="place" name="place" type="text" placeholder="lieu de la course" onkeypress="deletemessageError('errorPlace')" required value="<?= $_POST['place'] ?? '' ?>">
                </div>
                <div class="col-sm-6">
                    <label for="date" class="sr-only"></label><span id="errorDate" class="text-danger"><?= isset($errors['date']) ? $errors['date'] : '' ?></span>
                    <br>
                    <input class="inputfield3 " min="<?= date('Y-m-d') ?>" id="date" name="date" type="date" placeholder="Date" onkeypress="deletemessageError('errorDate')" required value="<?= $_POST['date'] ?? '' ?>">
                </div>





                <div class="col-sm-6">
                    <label for="description" class="sr-only"></label><span id="errorDescription" class="text-danger"><?= isset($errors['description']) ? $errors['description'] : '' ?></span>
                    <br>
                    <textarea class="inputfield3 textArea" id="description" name="description" type="description" required placeholder="description" onkeypress="deletemessageError('errorDescription')"></textarea>

                </div>

                <div class="col-sm-6">
                    <label for="start"> Heure de début <span class="text-danger"><?= isset($errors['start']) ? $errors['start'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3 " id="start" name="start" type="time" placeholder="l'heure de debut" required value="<?= $_POST['start'] ?? '10:00' ?>">
                </div>

                <div class="col-sm-6">
                    <label for="nblimitParticipant" class="sr-only"></label><span id="errornblimitParticipant" class="text-danger"><?= isset($errors['nblimitParticipant']) ? $errors['nblimitParticipant'] : '' ?></span>
                    <br>
                    <input class="inputfield3" id="nblimitParticipant" name="nblimitParticipant" type="number" min="0" max="1000" placeholder="nombre limite de participant " onkeypress="deletemessageError('errornblimitParticipant')" required value="<?= $_POST['nblimitParticipant'] ?? '' ?>">
                </div>

                <div class="col-sm-6">
                    <label for="end">Heure de fin:<span class="text-danger"><?= isset($errors['end']) ? $errors['end'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="end" name="end" type="time" placeholder="l'heure de fin " required value="<?= ($_POST['end']) ?? '15:00' ?>">
                </div>





                <div class="col-sm-6">
                    <label for="type" class="sr-only"></label><span id="type" class="text-danger"><?= isset($errors['type']) ? $errors['type'] : '' ?></span>
                    <br>
                    <select class="inputfield3" id="type" name="type" onclick="deletemessageError('errorType')">
                        <option value="" selected disabled>Veuillez selectionner une catégorie</option>
                        <?php foreach ($arrayCategories as $value) { ?>
                            <option value="<?= $value['category_id'] ?>" <?= isset($_POST['type']) && $_POST['type'] == $value['category_id'] ? 'selected' : '' ?>>
                                <?= $value['category_type'] ?></option>
                        <?php } ?>
                    </select>
                </div>





                <div class="col-sm-6">
                    <label for="departement" class="sr-only"></label><span id="departement" class="text-danger"><?= isset($errors['departement']) ? $errors['departement'] : '' ?></span>
                    <br>
                    <select class="inputfield3" id="department" name="departement" onclick="deletemessageError('errorDepartement')">
                        <option value="" selected disabled>Veuillez selectionner un departement</option>
                        <?php foreach ($arrayDepartment as $value) { ?>
                            <option value="<?= $value['departement_id'] ?>" <?= isset($_POST['departement']) && $_POST['departement'] == $value['departement_id'] ? 'selected' : '' ?>><?= $value['departement_name'] ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label for="" class="sr-only"></label><span id="distance" class="text-danger"><?= isset($errors['distance']) ? $errors['distance'] : '' ?></span>
                    <br>
                    <select class="inputfield3" id="distance" name="distance" onclick="deletemessageError('errorDistance')">
                        <option value="">Veuillez choisir une distance</option>
                        <option value="5" <?= isset($_POST['distance']) && $_POST['distance'] == '5' ? 'selected' : '' ?>>5km</option>
                        <option value="10" <?= isset($_POST['distance']) && $_POST['distance'] == '10' ? 'selected' : '' ?>>10km</option>
                        <option value="15" <?= isset($_POST['distance']) && $_POST['distance'] == '15' ? 'selected' : '' ?>>15km</option>
                        <option value="21" <?= isset($_POST['distance']) && $_POST['distance'] == '21' ? 'selected' : '' ?>>21km</option>
                        <option value="42" <?= isset($_POST['distance']) && $_POST['distance'] == '42' ? 'selected' : '' ?>>42km</option>
                    </select>
                </div>




                <div class="mt-3 p-0 m-0 d-flex justify-content-center text-center">
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