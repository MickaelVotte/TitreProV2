<?php session_start() ?>

<?php
require_once "../controllers/controller_admin.php";
require_once "../controllers/controller_courses.php";
require_once "../controllers/controller_subscribe.php";



?>



<?php include('../elements/top.php') ?>

<?php include('../elements/header.php'); ?>





<div class="text-center mt-5 mb-5 fs-5">
    <p>je suis l'admin</p>
</div>

<div class="row m-0 p-0">
    <div class="col-lg-6 col-sm-12 m-0 pe-2 ps-2">
        <p class="text-center m-2">Utilisateur</p>
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Information</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($OneInfoUser as $participant) { ?>
                    <tr>
                        <th scope="row"><?= $participant['user_id'] ?></th>
                        <td><?= $participant['user_firstname'] ?></td>
                        <td><?= $participant['user_lastname'] ?></td>
                        <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoUser-<?= $participant['user_id'] ?>">
                                voir
                            </button></td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCourse-<?= $participant['user_id'] ?>">
                                Supprimer
                            </button></td>
                    </tr>



                    <!-- Modal  supp coureur -->
                    <div class="modal fade" id="deleteCourse-<?= $participant['user_id'] ?>" tabindex="-1" aria-labelledby="deleteCourse-<?= $participant['user_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5"><?= $participant['user_firstname'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>Prénom: <?= $participant['user_firstname'] ?></li>
                                        <li>Nom: <?= $participant['user_lastname'] ?></li>
                                       
                                    </ul>

                                </div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <button type="button " class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                                        <input type="hidden" name="delete" value="<?= $participant['user_id'] ?>">
                                      <button type="button " class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Modal  info user -->
                    <div class="modal fade" id="infoUser-<?= $participant['user_id'] ?>" tabindex="-1" aria-labelledby="infoUser-<?= $participant['user_id'] ?>" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5"><?= $participant['user_firstname'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        <li>Prénom: <?= $participant['user_firstname'] ?></li>
                                        <li>Nom: <?= $participant['user_lastname'] ?></li>
                                        <li>Pseudo:  <?= $participant['user_pseudo'] ?></li>
                                        <li>Date de naissance:  <?= $participant['user_birthday'] ?></li>
                                        <li>adresse mail:  <?= $participant['user_mail'] ?></li>
                                    </ul>

                                </div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <button type="button " class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </tbody>
        </table>
    </div>










    <div class="col-6 m-0 pe-2 ps-2">
        <p class="text-center m-2">Course mise en ligne par les utilisateurs</p>

        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Info</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($eventArray as $event) { ?>
                    <tr>
                        <th scope="row"><?= $event['event_id'] ?></th>
                        <td><?= $event['event_name'] ?></td>
                        <td><?= $event['event_date'] ?></td>
                        <td><a class="btn btn-primary" href="../view/oneCourseInfo.php?eventId=<?= $event['event_id'] ?>">Voir</a></td>
                        <td>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#infoCourse-<?= $event['event_id'] ?>">
                                Supprimer
                            </button>
                        </td>


                        <!-- Modal supprimer course -->
                        <div class="modal fade" id="infoCourse-<?= $event['event_id'] ?>" tabindex="-1" aria-labelledby="infoCourse-<?= $event['event_id'] ?>" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"><?= $event['event_name'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez vous supprimer la course <?= $event['event_name'] ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="post">
                                            <button type="button " class="btn btn-danger" data-bs-dismiss="modal">annuler</button>
                                            <input type="hidden" name="delete" value="<?= $event['event_id'] ?>">
                                            <button class="btn btn-success">confirmer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>





<?php include('../elements/footer.php') ?>