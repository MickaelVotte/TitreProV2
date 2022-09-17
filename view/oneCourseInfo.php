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

<div class=" d-flex justify-content-center row m-0 p-0 mt-5 mb-5 ">
    <div class="mt-2 mb-2 d-flex justify-content-center col-sm-12 col-lg-4 m-0 p-0 ">
        <img class="cardInfo-image img-fluid text-center" src="data:image/png;base64,<?= $OneCourse['event_image'] ?>" alt="">
    </div>


    <div class="ms-3 mt-2 mb-2 col-sm-12 col-lg-4 border border-primary">

        <div class="row ">
            <div class="col-6">
                <p>Nom de la course: <br> <?= $OneCourse['event_name'] ?></p>
            </div>
            <div class="col-6">
                <p>Date: <br><?= $OneCourse['event_date'] ?></p>

            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <p>Type de Course: <br><?= $OneCourse['category_type'] ?></p>
            </div>
            <div class="col-6">
                <p>Description: <br><?= $OneCourse['event_description'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <p>Heure de départ: <br><?= $OneCourse['event_start'] ?></p>

            </div>
            <div class="col-6">
                <p>Heure de fin: <br><?= $OneCourse['event_end'] ?></p>

            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>Nombre de participant: <br><?= $OneCourse['event_limitmembers'] ?></p>

            </div>
            <div class="col-6">
                <p>Distance: <br><?= $OneCourse['event_distance'] ?>km</p>

            </div>
        </div>



        <div class="row">
            <div class="col-6">
                <p>Lieu: <br><?= $OneCourse['event_place'] ?></p>

            </div>
            <div class="col-6">
                <p>Departement: <br><?= $OneCourse['departement_name'] ?></p>

            </div>
        </div>







    </div>


</div>




<div class="text-center">
    <a href="./modifyOneCourseInfo.php?eventId=<?= $OneCourse['event_id'] ?>">Modifier</a>
</div>












<?php include('../elements/footer.php') ?>