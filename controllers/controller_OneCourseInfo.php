<?php


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';
require_once '../models/InscriptionRace.php';



//j'instancie un objet selon la classe Inscription afin d'utiliser les methodes 
$inscriptionObj = new Inscription();

//j'instancie un objet selon la classe Events afin d'utiliser les methodes 
$oneInfo = new Events();

if (isset($_GET['action']) && isset($_GET['eventId'])) {
   
    if ($_GET['action'] == 'participate') {
        if (isset($_SESSION['user'])) {
            $inscriptionObj->inscriptionRace($_SESSION['user']['user_id'], $_GET['eventId']);
            $_SESSION['swal'] = [
                'icon' => 'success',
                'title' => 'Inscription',
                'text' => 'Vous avez bien été inscrit à la course'
            ];
            header('Location: ./oneCourseInfo.php?eventId=' . $_GET['eventId']);
            exit;
        } else {
            header('Location: ./login.php');
            exit;
        }
    }
    if ($_GET['action'] == 'delete') {
        $oneInfo->deleteOneCourse($_GET['eventId']);
        $_SESSION['swal'] = [
            'icon' => 'success',
            'title' => 'Suppression',
            'text' => 'Vous avez bien supprimé la course'
        ];
       
        header('Location: ./courses.php');
        
        exit;
    }
    if ($_GET['action'] == 'unsubscribe') {
        $inscriptionObj->deleteParticipant($_SESSION['user']['user_id'], $_GET['eventId']);

        $_SESSION['swal'] = [
            'icon' => 'success',
            'title' => 'Désinscription',
            'text' => 'Vous avez bien été désinscrit à la course'
        ];
        header('Location: ./oneCourseInfo.php?eventId=' . $_GET['eventId']);

        exit;
    }

}


//permet de recuperer toutes les infos de la course
$oneCourse = $oneInfo->getOneCourse($_GET['eventId']);


//permet de recuperer le nombre de personne inscrit sur une course
$participate = $inscriptionObj->countParticipant($_GET['eventId']);

//permet d'obtenir tous les participant de la course sous forme de tableau afin de les afficher sur une liste
$allparticipants = $inscriptionObj->getParticipantRace($_GET['eventId']);
if (isset($_SESSION['user'])) {
    //permet de savoir si l'uilisateur est le proprietaire de la course
    $alreadyParticipate = $inscriptionObj->checkInscription($_GET['eventId'], $_SESSION['user']['user_id']);
}
