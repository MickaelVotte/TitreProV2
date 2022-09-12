<?php
    

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';


// 1 - je lance mes tests uniquement lors de la validation du formulaire de type POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // 1 - je lance mes tests uniquement lors de la validation du formulaire de type POST
    $errors = [];

    // je déclare mes regex 
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

    if(isset($_POST['age']))
    {
        if(empty($_POST['age'])){
            $errors['age']= 'Champ obligatoire';
        }else if($_POST['age'] < 18){
            $errors['age'] = "Vous devez etes majeurs pour être inscrit(e)";
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


    if (isset($_POST['password'])) {
        // si password est vide
        if ($_POST['password'] == '') {
            $errors['password'] = "Champ obligatoire";
            // si confirmPassword est vide et que password n'est pas vide
        } else if ($_POST['confirmPassword'] == '' && $_POST['password'] != '') {
            $errors['confirmPassword'] = "Champ obligatoire";
            // si les mots de passe sont différents
        } else if ($_POST['confirmPassword'] != $_POST['password']) {
            $errors['password'] = "Les mots de passe sont différents";
        }
    }



    if (!isset($_POST['cgu'])) {
        $errors['cgu'] = "Veuillez valider les CGU";
    }


    // si notre tableau d'erreurs est vide alors je declenche les actions suivantes
    if (count($errors) == 0) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $age = htmlspecialchars($_POST['age']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $coureurObj = new User();

        $coureurObj->addUser($firstname, $lastname, $age, $mail, $password);



    }
}

?>