<?php
    

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';





$OneInfo = new Events();
$OneCourse = $OneInfo->getOneCourse($_GET['eventId']);


