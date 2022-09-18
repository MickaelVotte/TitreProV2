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






<div class="bglogin4">


    <div class="container-cardInfo">

        <div>
            <div class="text-center text-white fs-2 fw-bolder title-cardInfo ">
                Information sur course: <br><?= $OneCourse['event_name'] ?>
            </div>
        </div>



        <div class=" d-flex justify-content-center row m-0 p-0 mt-5 mb-5 cardInfo-border">
            <div class=" col-sm-12 col-lg-5 m-0 p-0 p-2 ">
                <img class="cardInfo-image img-fluid text-center" src="data:image/png;base64,<?= $OneCourse['event_image'] ?>" alt="image_de_la_course">
            </div>


            <div class="mb-2 col-sm-12 col-lg-7 p-2 ps-3 cardInfo-textBorder">

                <div class="row ">
                    <div class="col-6">
                        <p class="cardInfo-title m-0">Nom de la course:</p>
                        <p> <?= $OneCourse['event_name'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class="cardInfo-title m-0">Date: </p>
                        <p><?= $OneCourse['event_date'] ?></p>

                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Type de Course:</p>
                        <p> <?= $OneCourse['category_type'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Description: </p>
                        <p><?= $OneCourse['event_description'] ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Nombre de participant:</p>
                        <p> <?= $OneCourse['event_limitmembers'] ?></p>

                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Distance: </p>
                        <p><?= $OneCourse['event_distance'] ?>km</p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Lieu:</p>
                        <p> <?= $OneCourse['event_place'] ?></p>

                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Departement:</p>
                        <p> <?= $OneCourse['departement_name'] ?></p>

                    </div>
                </div>




                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Heure de départ: </p>
                        <p> <?= $OneCourse['event_start'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Heure de fin:</p>
                        <p> <?= $OneCourse['event_end'] ?></p>
                    </div>
                </div>

                <div class="mb-2">
                    <p class=" cardInfo-title m-0">Créateur de la course:</p>
                    <p> <?= $OneCourse['user_firstname'] ?> <?= $OneCourse['user_lastname'] ?></p>
                </div>
    <hr class="mt-3 p-3">
            </div>







            <div class="row  text-center ">

                <div class="col-sm-4 col-lg-5 m-0 p-0 mb-3 fw-bolder fs-3 d-flex justify-content-center ">
                    <p>Running Race</p>
                </div>
                <div class="col-sm-4 col-lg-7 m-0 p-0 mb-3 d-flex justify-content-center">
                    
                    <a class="cardInfo-modify" href="./modifyOneCourseInfo.php?eventId=<?= $OneCourse['event_id'] ?>">Modifier</a>
                    <a class="cardInfo-modify" href="./participateCourse.php">Participer</a>
                </div>

            </div>

                <div class="row">
                    <div class="text-center">
                        <a class="linkBottom"  href="./courses.php">Retour à la page des courses</a>
                    </div>
                </div>

        </div>


    </div>

</div>






<?php include('../elements/footer.php') ?>