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
                Information sur la course: <br><?= $OneCourse['event_name'] ?>
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
                        <p class=" cardInfo2-title m-0">Nombre d'inscrits:</p>
                        <p><?= $Participate['nbParticipant'] ?></p>

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







            <div class="row  text-center m-0 p-0 ">

                <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center">

                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $OneCourse['user_id_user']) { ?>
                        <a class="cardInfo-modify " href="./modifyOneCourseInfo.php?eventId=<?= $OneCourse['event_id'] ?>">Modifier</a>
                    <?php } ?>
                </div>


                <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center ">
                    <!-- Button trigger modal -->
                    <a href="./participateCourse.php?eventId=<?= $OneCourse['event_id'] ?>" type="button" class="cardInfo-modify" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Participer
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez vous participer à cette course?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                <a href="./oneCourseInfo.php?action=participate&eventId=<?= $OneCourse['event_id'] ?>" type="button" class="btn btn-success">Oui</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center">
                    <button class="cardInfo-modify2 ">Supprimer</button>
                </div>


                <div class="row m-0 p-0">
                    <div class="text-center mt-3">
                        <a class="linkBottom" href="./courses.php">Retour à la page des courses</a>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <div class="container-cardInfo bg-white">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Valider</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>


    </div>





</div>


</div>

</div>






<?php include('../elements/footer.php') ?>