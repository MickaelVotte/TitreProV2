<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';


var_dump($_SESSION);
$OneInfo = new Events();
$OneCourse = $OneInfo->getOneCourse($_GET['eventId']);

if ($_SESSION['user']['user_id'] == $OneCourse['user_id_user']) {
  echo "TU AS LE DROIT";
}else{
    echo "TU N'AS PAS LE DROIT";
}


