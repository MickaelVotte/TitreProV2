<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Events.php';
require_once '../models/Categories.php';



$categoriesObj = new Categories();
$categoriesType = $categoriesObj->getCategories();




