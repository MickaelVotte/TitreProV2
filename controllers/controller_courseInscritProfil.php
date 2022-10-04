<?php


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/InscriptionRace.php';
require_once '../models/Events.php';

//j'instancie un obj selon la classe Inscription afin d'utiliser les méthodes



$inscriptionObj = new Inscription();


if(isset($_POST['validate'])){
$inscriptionObj->validateParticipation($_POST['validate'], 1 );
}




$historique = $inscriptionObj->getAllUserParticipation($_SESSION['user']['user_id']);

$eventObj = new Events();

$getAllUserEvents = $eventObj->getUserOwnerCourse($_SESSION['user']['user_id']);



//permet d'obtenir tous les participant de la course sous forme de tableau afin de les afficher sur une liste
$allparticipants = $inscriptionObj->getParticipantRace($_SESSION['user']['user_id']);

$allEvents = $eventObj->getUserEvent($_SESSION['user']['user_id']);
