<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/Events.php';
require_once '../models/Departement.php';
require_once '../models/Categories.php';

$departmentObj = new departement();
$arrayDepartment = $departmentObj->getDepartmentNormandie();

$categoriesObj = new Categories();
$toto = $categoriesObj->getCategories();




//j'instancie un nouvel objet $allEvent selon la classe EditEvent
$allEvent = new Events();


if (isset($_GET['eventType'])) {
    $eventArray = $allEvent->getFilterType($_GET['eventType']);
} elseif (isset($_GET['departement'], $_GET['distance'], $_GET['type'])) {
    $eventArray = $allEvent->getFilterSearch($_GET['departement'], $_GET['distance'], $_GET['type']);
} /*elseif (isset($_GET['departement'], $_GET['distance'])) {
    $eventArray = $allEvent->getFilter2Search($_GET['departement'], $_GET['distance']);
} elseif (isset($_GET['departement'], $_GET['type'])) {
    $eventArray = $allEvent->getFilter2Search($_GET['departement'], $_GET['type']);*/
else {
    //je crée une varible $eventArray qui va contenir tous les events dans un array
    $eventArray = $allEvent->getAllEvent();
}






$badgeColorArray = [
    'Course à pied' => 'colorBgCardMarathon',
    'Trail' => 'colorBgCardTrial',
    'Event' => 'colorBgCardEvent'
];
