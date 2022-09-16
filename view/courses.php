<?php session_start(); ?>
<?php

require_once "../models/Database.php";
require_once "../models/Categories.php";
require_once "../models/Departement.php";
require_once "../controllers/controller_editEvent.php";
require_once "../controllers/controller_courses.php";
include('../elements/top.php');
include('../elements/header.php');
?>





<div class="banner-image2 w-100 d-flex justify-content-center align-items-center">
    <div class="text-center text-white fs-1 fw-bolder">
        Running Race
    </div>
</div>

<div class="text-center">
    <div class="row justify-content-md-center m-0 p-0 mt-5 bodyCourses   border border-primary ">
        <div class="col-lg-4 col-sm-12">
            <select class="inputfield3" id="department" name="departement">
                <option value="" selected disabled>Veuillez selectionner un departement</option>
                <?php foreach ($arrayDepartment as $value) { ?>
                    <option value="<?= $value['departement_id'] ?>"><?= $value['departement_name'] ?></option>
                <?php  } ?>
            </select>
        </div>


        <div class="col-lg-4 col-sm-12 ">
            <div class="dropdown">

                <select class="inputfield3" id="distance" name="distance" onclick="deletemessageError('errorDistance')">
                    <option value="">Veuillez choisir une distance</option>
                    <option value="">5km</option>
                    <option value="">10km</option>
                    <option value="">15km</option>
                    <option value="">21km</option>
                    <option value="">42km</option>
                </select>
            </div>
        </div>




        <div class="col-lg-4 col-sm-12">

            <div class="dropdown">
                <select class="inputfield3" id="type" name="type">
                    <option value="" selected disabled>Veuillez selectionner une catégorie</option>
                    <?php foreach ($arrayCategories as $value) { ?>
                        <option value="<?= $value['category_id'] ?>"><?= $value['category_type'] ?></option>
                    <?php } ?>
                </select>

            </div>
        </div>
    </div>
</div>



<div class="text-center mt-5">
    <button> Rechercher</button>
</div>


</div>

</div>


<div>
    <div class="row justify-content-md-center m-0 p-3 mt-5 mb-5">
        <?php foreach ($eventArray as $event) { ?>
            <div class="col-lg-3 col-sm-12 mt-5 mb-5">
                <div class="card">
                    <img class="card-image img-fluid text-center" src="data:image/png;base64,<?= $event['event_image'] ?>" alt="">
                    <div class="card-title">
                        <span class="date"><?= $event['event_date'] ?></span>
                        <h3 class="fw-bolder"><?= $event['category_type'] ?></h3>
                        <span class="date"><?=$event['event_name']?></span>
                    </div>
                    <div class="card-paragraph">
                        <p><?= $event['event_description']?></p>
                    </div>
                    <div class="card-bottom">
                        <p><?= $event['event_distance']?>km</p>
                        <div class="stat">
                            <a class="btncard" href="./oneCourseInfo.php?eventId=<?=$event['event_id']?>">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>
</div>











<?php include('../elements/footer.php') ?>