<?php

if (!isset($_SESSION['user'])) {
    header('Location: home.php');
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';



$test = false;


if ($_SESSION['user']['user_id'] != $_GET['id']) {
    header('Location: profil.php');
}




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = [];


    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";

    $regexPhoneNumber = "/^[0-9]{10}+$/";


    //isset permet de vérifier que l'input lastname existe dans la superglobale POST
    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Champ obligatoire';
            // la fonction preg_match pour valider le format
        } else if (!preg_match($regexName, $_POST['lastname'])) {
            $errors['lastname'] = 'Format invalide';
        }
    }

    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Champ obligatoire';
            //la fonction preg_match pour valider le format
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $errors['firstname'] = 'Format invalide, ex. DUPONT';
        }
    }

    if (isset($_POST['birthday'])) {
        if (empty($_POST['birthday'])) {
            $errors['birthday'] = 'Champ obligatoire';
            // } else if ($_POST['birthday'] < 18) {
            //     $errors['birthday'] = "Vous devez etes majeurs pour être inscrit(e)";
            // }
        }
    }



    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) {
            $errors['mail'] = "Champ obligatoire";
            // on contrôle le format du mail à l'aide d'un filtar_var et filter_validate_email
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Format mail invalide";
        }
    }


    if (count($errors) == 0) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $birthday = htmlspecialchars($_POST['birthday']);
        $mail = htmlspecialchars($_POST['mail']);
        $idUser = htmlspecialchars($_POST['idUser']);

        $modifycoureurObj = new User();

        $modifycoureurObj->updateUser($lastname, $firstname,  $birthday, $mail, $idUser);
    }
}


$user = new User();


$infoUser = $user->getOneCoureur($_GET['id']);
