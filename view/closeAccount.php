<?php
session_start();
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/User.php';
require_once '../controllers/controller_closeAccount.php';
include('../elements/top.php');
include('../elements/header.php');

?>

<div class="row m-0 p-0 bglogin3">

    <div class="col-12 ">
        <div class="formulaire4">
            <div class="text-center mt-5 m-0 p-0">
                <a class="textLoginBottom" href="./home.php">Retournez à la page d'accueil</a>
            </div>


            <div class="titleLogin">
                <p class="text-center fs-5">cliquer sur le bouton ci-dessous pour supprimer votre compte</p>
            </div>

            <div class="d-flex justify-content-center mt-5 text-center">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Supprimer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suppression de compte</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Voulez vous vraiment supprimer votre compte?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <a href="./closeAccount.php?action=delete&idUser=<?= $_SESSION['user']['user_id'] ?>" class="btn btn-primary">supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</div>


<?php include('../elements/footer.php') ?>