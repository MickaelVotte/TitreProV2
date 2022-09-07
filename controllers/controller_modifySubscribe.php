<?php

if(!isset($_SESSION['user']))
{
    header('Location: home.php');
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';



$user = new User();


$infoUser = $user->getOneCoureur($_GET['id0']);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = [];


    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";

    $regexPhoneNumber = "/^[0-9]{10}+$/";





    

}