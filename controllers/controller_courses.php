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
$categoriesType = $categoriesObj->getCategories();




//j'instancie un nouvel objet $allEvent selon la classe EditEvent
$allEvent = new Events();




if (isset($_GET['distance']) && !isset($_GET['departement']) && !isset($_GET['type'])) {
    $eventArray = $allEvent->getFilterSearchDistance($_GET['distance']);
}
elseif (isset($_GET['departement']) && !isset($_GET['distance']) && !isset($_GET['type'])) {
    $eventArray = $allEvent->getFilterSearchDepartement($_GET['departement']); 
} 
elseif (isset($_GET['type']) && !isset($_GET['departement']) && !isset($_GET['distance'])) {
    $eventArray = $allEvent->getFilterSearchType($_GET['type']);
}
 elseif (isset($_GET['departement'], $_GET['distance']) && !isset($_GET['type'])) {
    $eventArray = $allEvent->getFilterSearchDepartementDistance($_GET['departement'], $_GET['distance']); 
    
} 
elseif (isset($_GET['departement'], $_GET['type']) && !isset($_GET['distance'])) {
    $eventArray = $allEvent->getFilterSearchDepartementType($_GET['departement'], $_GET['type']); 
}
 elseif (isset($_GET['distance'], $_GET['type']) && !isset($_GET['departement'])) {
    $eventArray = $allEvent->getFilterSearchDistanceType($_GET['distance'], $_GET['type']); 
    
   
} elseif (isset($_GET['departement'], $_GET['distance'], $_GET['type'])) {
    $eventArray = $allEvent->getFilterSearchDepartementDistanceType($_GET['departement'], $_GET['distance'], $_GET['type']);
} else {
    //je crée une varible $eventArray qui va contenir tous les events dans un array
    $eventArray = $allEvent->getAllEvent();
}






$badgeColorArray = [
    'Course à pied' => 'colorBgCardMarathon',
    'Trail' => 'colorBgCardTrial',
    'Event' => 'colorBgCardEvent'
];
