<?php
    

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';
require_once '../models/InscriptionRace.php';




$OneInfo = new Events();
$OneCourse = $OneInfo->getOneCourse($_GET['eventId']);

$inscriptionObj = new Inscription();
$Participate = $inscriptionObj->countParticpant($_GET['eventId']);


if(isset($_GET['action']) && isset($_GET['eventId']));
{
    if($_GET['action']=='participate'){
        $inscriptionObj->inscriptionRace($_SESSION['user']['user_id'], $_GET['eventId']);
    }
}