<?php


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/InscriptionRace.php';
require_once '../models/Events.php';

//j'instancie un obj selon la classe Inscription afin d'utiliser les méthodes

$inscriptionObj = new Inscription();


$totalKm= $inscriptionObj->getSumKmValidate($_SESSION['user']['user_id']);

$totalEvent= $inscriptionObj->getCountEvent($_SESSION['user']['user_id']);


