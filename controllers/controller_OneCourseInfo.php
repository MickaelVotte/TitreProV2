<?php


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';
require_once '../models/InscriptionRace.php';




$inscriptionObj = new Inscription();

$oneInfo = new Events();

if (isset($_GET['action']) && isset($_GET['eventId'])) {
    if ($_GET['action'] == 'participate') {
        $inscriptionObj->inscriptionRace($_SESSION['user']['user_id'], $_GET['eventId']);
        $_SESSION['swal'] = true;
        header('Location: ./oneCourseInfo.php?eventId=' . $_GET['eventId']);
        exit;
    }
    if ($_GET['action'] == 'delete') {
        $oneInfo->deleteOneCourse($_GET['eventId']);
        
        $_SESSION['swal'] = true;
        header('Location: ./oneCourseInfo.php');
        exit;
    }
}



$oneCourse = $oneInfo->getOneCourse($_GET['eventId']);

$participate = $inscriptionObj->countParticipant($_GET['eventId']);

$allparticipants = $inscriptionObj->getParticipantRace($_GET['eventId']);
