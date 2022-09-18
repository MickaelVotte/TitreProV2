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





<section class="banner-image2 w-100 d-flex justify-content-center align-items-center">
    <div class="containerForm">
        <div class="text-center text-white fs-1 fw-bolder mt-5">
            Running Race
        </div>
        <form class="text-center d-flex justify-content-center" action="" method="get">


            <div class="text-center selectFormCss">
                <div class="row justify-content-md-center m-0 p-0 bodyCourses">
                    <div class="col-lg-3 col-sm-12 m-0 p-0">
                        <select class="inputField4" id="department" name="departement">
                            <option value="" selected disabled>Veuillez selectionner un departement</option>
                            <?php foreach ($arrayDepartment as $value) { ?>
                                <option value="<?= $value['departement_id'] ?>"><?= $value['departement_name'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>


                    <div class="col-lg-3 col-sm-12 m-0 p-0 ">
                        <div class="dropdown m-0 p-0">

                            <select class="inputField4" id="distance" name="distance" onclick="deletemessageError('errorDistance')">
                                <option value="">Veuillez choisir une distance</option>
                                <option value="">5km</option>
                                <option value="">10km</option>
                                <option value="">15km</option>
                                <option value="">21km</option>
                                <option value="">42km</option>
                            </select>
                        </div>
                    </div>




                    <div class="col-lg-3 col-sm-12 m-0 p-0">

                        <div class="dropdown m-0 p-0">
                            <select class="inputField4" id="type" name="type">
                                <option value="" selected disabled>Veuillez selectionner une catégorie</option>
                                <?php foreach ($arrayCategories as $value) { ?>
                                    <option value="<?= $value['category_id'] ?>"><?= $value['category_type'] ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    </div>


                    <div class="col-lg-3 col-sm-12 m-0 p-0">
                        <button class="btn-login2"> Rechercher</button>
                    </div>
                </div>



            </div>
        </form>
    </div>




</section>


<div class=" d-flex justify-content-center mt-5">
    <p class="fw-bolder fs-3"> Les Courses de Normandie</p>
</div>

<hr>


</div>

</div>


<div>
    <div class="row justify-content-md-center m-0 p-3 mt-5 mb-5">
        <?php foreach ($eventArray as $event) { ?>
            <div class="col-lg-3 col-sm-12 mt-5 mb-5">
                <div class="box">
                    <img class="box-image img-fluid" src="data:image/png;base64,<?= $event['event_image'] ?>" alt="">
                    <div class="box-title">
                        <span class="date"><?= $event['event_date'] ?></span>
                        <h3 class="fw-bolder"><?= $event['category_type'] ?></h3>
                        <span class="name"><?= $event['event_name'] ?></span>
                    </div>
                    <div class="box-paragraph">
                        <p><?= $event['event_description'] ?></p>
                    </div>
                    <div class="box-distance">
                        <p><?= $event['event_distance'] ?>km</p>
                    </div>
                    <div class="box-bottom">
                        <div class="stat">
                            <a class="btnbox" href="./oneCourseInfo.php?eventId=<?= $event['event_id'] ?>">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>
</div>











<?php include('../elements/footer.php') ?>