<?php session_start(); ?>
<?php
require_once "../models/Database.php";
require_once "../models/Categories.php";
require_once "../models/Departement.php";
require_once "../controllers/controller_OneCourseInfo.php";
require_once "../controllers/controller_modifyOneCourse.php";
require_once "../controllers/controller_courses.php";

include('../elements/top.php');
include('../elements/header.php');

?>




<div class=" bglogin3 row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12 formulaire3" action="" method="post" enctype="multipart/form-data">



        <div class="form-control text-center  shadow p-0 m-0 bg-body rounded ">
            <div class="text-center titleLogin">
                <p>Modifier la course</p>
            </div>
            <hr>
            <div class="row justify-content-center">
                <img id="imgPreview" class="col-lg-8 col-sm-12 img-fluid imgPreview" src="../assets/imageDefaut/imgdefault.png" alt="image_par_defaut_course_crée">
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="image"> <span class="text-danger"><?= isset($errors['image']) ? $errors['image'] : '' ?></span></label>
                    <br>
                    <input class="inputfield5" id="image" name="image" type="file" data placeholder="image" value="<?= $_POST['image'] ?? '' ?>">
                </div>
            </div>






            <div class="row">

                <div class="col-sm-6 p-0 m-0">
                    <label for="name"><span id='errorName' class="text-danger"><?= isset($errors['name']) ? $errors['name'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="name" name="name" type="text" placeholder="Nom de la course" onkeypress="deletemessageError('errorName')" required value="<?= $_POST['name'] ?? $modifyCourse['event_name'] ?>">
                </div>
                <div class="col-sm-6 p-0 m-0">
                    <label for="place"><span id="errorPlace" class="text-danger"><?= isset($errors['place']) ? $errors['place'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="place" name="place" type="text" placeholder="lieu de la course" onkeypress="deletemessageError('errorPlace')" required value="<?= $_POST['place'] ?? $modifyCourse['event_place'] ?>">
                </div>
                <div class="col-sm-6 p-0 m-0">
                    <label for="date"> <span id="errorDate" class="text-danger"><?= isset($errors['date']) ? $errors['date'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3 " id="date" name="date" type="date" placeholder="Date" onkeypress="deletemessageError('errorDate')" required value="<?= $_POST['date'] ?? $modifyCourse['event_date'] ?>">
                </div>





                <div class="col-sm-6 p-0 m-0">
                    <label for="description"> <span id="errorDescription" class="text-danger"><?= isset($errors['description']) ? $errors['description'] : '' ?></span></label>
                    <br>
                    <textarea class="inputfield3" id="description" name="description" type="description" required placeholder="description" onkeypress="deletemessageError('errorDescription')"><?= $_POST['description'] ?? $modifyCourse['event_description'] ?></textarea>
                </div>

                <div class="col-sm-6 p-0 m-0">
                    <label class="fw-bold" for="start"> Heure de début <span class="text-danger"><?= isset($errors['start']) ? $errors['start'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3 " id="start" name="start" type="time" placeholder="l'heure de debut" required value="<?= $_POST['start'] ?? $modifyCourse['event_start'] ?>">
                </div>

                <div class="col-sm-6 p-0 m-0">
                    <label for="nblimitParticipant"> <span id="errornblimitParticipant" class="text-danger"><?= isset($errors['nblimitParticipant']) ? $errors['nblimitParticipant'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="nblimitParticipant" name="nblimitParticipant" type="number" min="0" max="1000" placeholder="nombre limite de participant " onkeypress="deletemessageError('errornblimitParticipant')" required value="<?= $_POST['nblimitParticipant'] ?? $modifyCourse['event_limitmembers'] ?>">
                </div>

                <div class="col-sm-6 p-0 m-0">
                    <label class="fw-bolder" for="end">Heure de fin:<span class="text-danger"><?= isset($errors['end']) ? $errors['end'] : '' ?></span></label>
                    <br>
                    <input class="inputfield3" id="end" name="end" type="time" placeholder="l'heure de fin " required value="<?= ($_POST['end']) ?? $modifyCourse['event_end'] ?>">
                </div>





                <div class="col-sm-6 p-0 m-0">
                    <label for="type"><span id="type" class="text-danger"><?= isset($errors['type']) ? $errors['type'] : '' ?></span></label>
                    <br>
                    <select class="inputfield3" id="type" name="type" onclick="deletemessageError('errorType')">
                        <option value="" selected disabled>Veuillez selectionner une catégorie</option>
                        <?php foreach ($arrayCategories as $value) { ?>
                            <option value="<?= $value['category_id'] ?>" <?= $value['category_id'] == $modifyCourse['category_id_categories'] ? 'selected' : '' ?>><?= $value['category_type'] ?></option>
                        <?php } ?>
                    </select>
                </div>





                <div class="col-sm-6 p-0 m-0">
                    <label for="departement"> <span id="departement" class="text-danger"><?= isset($errors['departement']) ? $errors['departement'] : '' ?></span></label>
                    <br>
                    <select class="inputfield3" id="department" name="departement" onclick="deletemessageError('errorDepartement')">
                        <option value="" selected disabled>Veuillez selectionner un departement</option>
                        <?php foreach ($arrayDepartment as $value) { ?>
                            <option value="<?= $value['departement_id'] ?>" <?= $value['departement_id'] == $modifyCourse['departement_id_departement'] ? 'selected' : '' ?>><?= $value['departement_name'] ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="col-sm-6  p-0 m-0">
                    <label for=""> <span id="distance" class="text-danger"><?= isset($errors['distance']) ? $errors['distance'] : '' ?></span></label>
                    <br>
                    <select class="inputfield3" id="distance" name="distance" onclick="deletemessageError('errorDistance')">
                        <option value="">Veuillez choisir une distance</option>
                        <option value="5" <?= $modifyCourse['event_distance'] == '5' ? 'selected' : '' ?>>5km</option>
                        <option value="10" <?= $modifyCourse['event_distance'] == '10' ? 'selected' : '' ?>>10km</option>
                        <option value="15" <?= $modifyCourse['event_distance'] == '15' ? 'selected' : '' ?>>15km</option>
                        <option value="21" <?= $modifyCourse['event_distance'] == '21' ? 'selected' : '' ?>>21km</option>
                        <option value="42" <?= $modifyCourse['event_distance'] == '42' ? 'selected' : '' ?>>42km</option>
                    </select>
                </div>


                <div class="m-0 mt-3 me-1 d-flex justify-content-center text-center">
                    <div>
                        <input type="hidden" name="editEventId" value="<?= $modifyCourse['event_id'] ?>">
                        <button class="btn-login">Valider</button>
                    </div>
                </div>

                <div class="textLoginBottom">
                    <p> <a class="linkBottom" href="./courses.php">Retournez à la page des courses</a>
                    </p>
                </div>
            </div>
    </form>

</div>



<?php if (isset($swal)) { ?>
    <script>
        Swal.fire({
            icon: '<?= $swal['icon'] ?>',
            title: '<?= $swal['title'] ?>',
            text: '<?= $swal['text'] ?>'
        })
    </script>
<?php } ?>










<?php include('../elements/footer.php') ?>