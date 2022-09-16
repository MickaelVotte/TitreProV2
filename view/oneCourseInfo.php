<?php session_start(); ?>
<?php
require_once "../models/Database.php";
require_once "../models/Categories.php";
require_once "../models/Departement.php";
require_once "../controllers/controller_OneCourseInfo.php";
require_once "../controllers/controller_courses.php";

include('../elements/top.php');
include('../elements/header.php');

?>



<div class="card">
    <div>
    <img class="card-image img-fluid text-center" src="data:image/png;base64,<?= $OneCourse['event_image'] ?>" alt="">
    </div>
    <p>Date: <?= $OneCourse['event_date'] ?></p>
    <p>Type de Course: <?= $OneCourse['category_type'] ?></p>
    <p>Nom de la course: <?= $OneCourse['event_name'] ?></p>
    <p>Description: <?= $OneCourse['event_description'] ?></p>
    <p>Heure de départ: <?= $OneCourse['event_start'] ?></p>
    <p>Heure de fin: <?= $OneCourse['event_end'] ?></p>
    <p>Nombre de participant: <?= $OneCourse['event_limitmembers'] ?></p>
    <p>Distance: <?= $OneCourse['event_distance'] ?>km</p>
    <p>Lieu: <?= $OneCourse['event_place'] ?></p>
    <p>Departement: <?= $OneCourse['departement_name'] ?></p>
</div>











<?php include('../elements/footer.php') ?>