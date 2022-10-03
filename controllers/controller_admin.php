<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';
require_once '../models/InscriptionRace.php';
require_once '../models/User.php';



//j'instancie un objet selon la classe Inscription afin d'utiliser les methodes 
$inscriptionObj = new Inscription();

//j'instancie un objet selon la classe Events afin d'utiliser les methodes 
$oneInfo = new Events();

$userInfoObj  = new User();


if (isset($_POST['delete'])) {

    //je verifie si il y des courses valider (km valider)
    if ($inscriptionObj->checkValidateParticipation($_POST['delete'])) {
        //si oui j'archive la course pour conserver les donnees
        $oneInfo->archiveEvent($_POST['delete']);
    } else {
        //Si non je supprime la course
        $oneInfo->deleteOneCourse($_POST['delete']);
    };

    $_SESSION['swal'] = [
        'icon' => 'success',
        'title' => 'Suppression',
        'text' => 'Vous avez bien supprimé la course'
    ];


    if ($userInfoObj->deleteUser($_POST['delete'])) {
        //on unset et destroy les variables de session
        session_unset();
        session_destroy();
    };
}


$OneInfoUser = $userInfoObj->getAllCoureur();
