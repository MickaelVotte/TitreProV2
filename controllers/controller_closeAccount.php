<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';



if (isset($_GET['action']) && isset($_GET['idUser']) && $_GET['action'] == 'delete') {
    $deleteUser = new User();

    $deleteUser->deleteUser($_GET['idUser']);
  //on unset et destroy les variables de session
    session_unset();
    session_destroy();

    header('Location: home.php');
}

  