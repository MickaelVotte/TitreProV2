<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';

require_once '../models/Events.php';




//j'instancie un nouvel objet $allEvent selon la classe EditEvent
$allEvent = new Events();

//je crée une varible $eventArray qui va contenir tous les events dans un array
$eventArray = $allEvent->getAllEvent();


$badgeColorArray = [
    'Course à pied'=>'colorBgCardMarathon',
    'Trial'=>'colorBgCardTrial',
    'Event'=>'colorBgCardEvent'
];
?>








