<?php session_start(); ?>
<?php
require_once "../models/Database.php";
require_once "../models/Categories.php";
require_once "../models/Departement.php";
require_once "../controllers/controller_OneCourseInfo.php";
require_once "../controllers/controller_modifyOneCourse.php";
require_once "../controllers/controller_courses.php";
require_once "../controllers/controller_OneCourseInfo.php";

include('../elements/top.php');
include('../elements/header.php');

?>






<div class="bglogin4">


    <div class="container-cardInfo">

        <div>
            <div class="text-center text-white fs-2 fw-bolder title-cardInfo ">
                Information sur la course: <br><?= $oneCourse['event_name'] ?>
            </div>
        </div>



        <div class=" d-flex justify-content-center row m-0 p-0 mt-5 mb-5 cardInfo-border">
            <div class=" col-sm-12 col-lg-5 m-0 p-0 p-2 ">
                <img class="cardInfo-image img-fluid text-center" src="data:image/png;base64,<?= $oneCourse['event_image'] ?>" alt="image_de_la_course">
            </div>


            <div class="mb-2 col-sm-12 col-lg-7 p-2 ps-3 cardInfo-textBorder">

                <div class="row ">
                    <div class="col-6">
                        <p class="cardInfo-title m-0">Nom de la course:</p>
                        <p> <?= $oneCourse['event_name'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class="cardInfo-title m-0">Date: </p>
                        <p><?= $oneCourse['event_date'] ?></p>

                    </div>

                </div>

                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Type de Course:</p>
                        <p> <?= $oneCourse['category_type'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Description: </p>
                        <p><?= $oneCourse['event_description'] ?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Nombre de participant:</p>
                        <p> <?= $oneCourse['event_limitmembers'] ?></p>

                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Distance: </p>
                        <p><?= $oneCourse['event_distance'] ?>km</p>

                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo2-title m-0">Nombre d'inscrits:</p>
                        <!-- //permet de mettre à jour le nombre de participant -->
                        <p><?= $participate['nbParticipant'] ?></p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Lieu:</p>
                        <p> <?= $oneCourse['event_place'] ?></p>

                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Departement:</p>
                        <p> <?= $oneCourse['departement_name'] ?></p>

                    </div>
                </div>




                <div class="row">
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Heure de départ: </p>
                        <p> <?= $oneCourse['event_start'] ?></p>
                    </div>
                    <div class="col-6">
                        <p class=" cardInfo-title m-0">Heure de fin:</p>
                        <p> <?= $oneCourse['event_end'] ?></p>
                    </div>
                </div>

                <div class="mb-2">
                    <p class=" cardInfo-title m-0">Créateur de la course:</p>
                    <p> <?= $oneCourse['user_firstname'] ?> <?= $oneCourse['user_lastname'] ?></p>
                </div>
                <hr class="mt-3 p-3">
            </div>





            <div class="row  text-center m-0 p-0 ">

                <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center">
                    <?php
                    // je verifie si l'utisateur est le createur de la course pour afficher le bouton modifier
                    if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $oneCourse['user_id_user']) { ?>
                        <a class="cardInfo-modify " href="./modifyOneCourseInfo.php?eventId=<?= $oneCourse['event_id'] ?>">Modifier</a>
                    <?php } ?>
                </div>






                <!-- //je verifie si l'utilisateur est le créateur pour afficher le bouton participation -->
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] != $oneCourse['user_id_user']) { ?>

                <!-- //permet de savoir si le nombre de personne inscrite est egale a la limite de participant -->
                    <?php if ($oneCourse['event_limitmembers']  === $participate['nbParticipant'] && ! $alreadyParticipate) { ?>
                        <p>Course complet</p>
                 


                    <!-- je fais une condition qui modifier l'etat du bouton: participer/desinscrire -->
                    <?php }else if (isset($alreadyParticipate) && $alreadyParticipate) { ?>

                        <!-- bouton se desinscrire -->
                        <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center ">

                            <a href="./participateCourse.php?eventId=<?= $oneCourse['event_id'] ?>" type="button" class="cardInfo-modify" data-bs-toggle="modal" data-bs-target="#unsubscribe">
                                se désinscrire
                            </a>
                        </div>

                        <!------------------ Modal confirmation de la desincriptiion-------------------->
                        <div class="modal fade" id="unsubscribe" tabindex="-1" aria-labelledby="unsubscribe" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $oneCourse['event_name'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous vous retirer de la course?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                        <a href="./oneCourseInfo.php?action=unsubscribe&eventId=<?= $oneCourse['event_id'] ?>" type="button" class="btn btn-success">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                   
                   <?php  } else { ?>
                        <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center ">
                            <!-- bouton participer -->
                            <a href="./participateCourse.php?eventId=<?= $oneCourse['event_id'] ?>" type="button" class="cardInfo-modify" data-bs-toggle="modal" data-bs-target="#subscribe">
                                Participer
                            </a>
                        </div>


                        <!-- modal pour confirmer la participation à la course -->
                        <div class="modal fade" id="subscribe" tabindex="-1" aria-labelledby="subscribe" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $oneCourse['event_name'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous participer à cette course?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                        <a href="./oneCourseInfo.php?action=participate&eventId=<?= $oneCourse['event_id'] ?>" type="button" class="btn btn-success">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>

                <?php
                // je fais une condition pour savoir si l'utilisateur est le proprio de la course si oui il pourra la supprimer
                if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $oneCourse['user_id_user']) { ?>
                    <!-- bouton supprimer -->
                    <div class="col-lg-4 col-sm-12 m-0 p-0 mb-3 d-flex justify-content-center">
                        <button type="button" class="cardInfo-modify2" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            supprimer
                        </button>
                    </div>
                <?php } ?>


                <!-- modal de confirmation pour supprimer la course -->
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel2">Supprimer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez vous supprimer la course?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                <input type="hidden" name="delete" value="">
                                <a href="./participateCourse.php?action=delete&eventId=<?= $_GET['eventId'] ?>&idUser=<?= $_SESSION['user']['user_id'] ?>" type="button" class="btn btn-success">Oui</a>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row m-0 p-0">
                    <div class="text-center mt-3">
                        <a class="linkBottom" href="./courses.php">Retour à la page des courses</a>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php
    if (isset($_SESSION['user']) && $_SESSION['user']['user_id'] == $oneCourse['user_id_user']) { ?>

        <div>
            <p class="title-cardInfo text-center text-white fs-2 fw-bolder">Valider les kilometres des participants</p>
        </div>


        <div class="container-cardInfo bg-white rounded">





            <table class="table text-center">
                <thead>
                    <tr>

                        <th scope="col">Pseudo</th>
                        <th scope="col">km Valider</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allparticipants as $participant) { ?>

                        <tr>

                            <td><?= $participant['user_pseudo'] ?></td>
                            <td><a href="./oneCourseInfo.php?action=validateKm&userId<?= $participant['user_id'] ?>" class="btn btn-success">Oui</a>
                                <button class="btn btn-danger">Non</button>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>



        </div>

    <?php } ?>



</div>


</div>

</div>


<?php if (isset($_SESSION['swal'])) { ?>
    <script>
        Swal.fire({
            icon: '<?= $_SESSION['swal']['icon'] ?>',
            title: '<?= $_SESSION['swal']['title'] ?>',
            text: '<?= $_SESSION['swal']['text'] ?>'
        })
    </script>
<?php
    unset($_SESSION['swal']);
} ?>


<?php include('../elements/footer.php') ?>