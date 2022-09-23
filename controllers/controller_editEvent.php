<?php


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';
require_once '../models/Events.php';
require_once '../helpers/form.php';
require_once '../models/Departement.php';
require_once '../models/Categories.php';




$departmentObj = new departement();
$arrayDepartment = $departmentObj->getDepartmentNormandie();



$categoriesObj = new Categories();
$arrayCategories = $categoriesObj->getCategories();

// 1 - je lance mes tests uniquement lors de la validation du formulaire de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    // 1 - je lance mes tests uniquement lors de la validation du formulaire de type POST
    $errors = [];

    // je déclare mes regex 
    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";

    $regexPhoneNumber = "/^[0-9]{10}+$/";


    //regex image
    $paramUpload = [
        // Taille max de l'image
        'size' => 6000000,
        // les extensions autorisé
        'extension' => ['jpeg', 'jpg', 'webp', 'png'],
        // le nom du répertoire qui va accueillir les images
        'directory' => '../assets/imageDefaut/',
        // choix de l'extension lors de l'enregistrement de l'image
        'extend' => 'png'
    ];

    //isset permet de vérifier que l'input lastname existe dans la superglobale POST


    if (isset($_POST['name'])) {
        if (empty($_POST['name'])) {
            $errors['name'] = 'Champ obligatoire';
            //la fonction preg_match pour valider le format
        } elseif (!preg_match($regexName, $_POST['name'])) {
            $errors['name'] = 'Format invalide, ex. La course à Béa';
        }
    }

    if (isset($_POST['place'])) {
        if (empty($_POST['place'])) {
            $errors['place'] = 'Champ obligatoire';
            //la fonction preg_match pour valider le format
        } elseif (!preg_match($regexName, $_POST['name'])) {
            $errors['place'] = 'Format invalide, ex. Le Havre';
        }
    }

    if (isset($_POST['date'])) {
        if (empty($_POST['date']))
            $errors['date'] = 'Champ obligatoire';
    }

    if (isset($_POST['start'])) {
        if (empty($_POST['start']))
            $errors['start'] = 'champ obligatoire';
    }

    if (isset($_POST['end'])) {
        if (empty($_POST['end']))
            $errors['end'] = 'champ obligatoire';
    }

    if (isset($_POST['nblimitParticipant'])) {
        if (empty($_POST['nblimitParticipant']))
            $errors['nblimitParticipant'] = 'champ obligatoire';
    }

    if (isset($_POST['description'])) {
        if (empty($_POST['description'])) {
            $errors['description'] = "Champ obligatoire";
        }
    }
    if (isset($_POST['distance'])) {
        if (empty($_POST['distance'])) {
            $errors['distance'] = "Champ obligatoire";
        }
    }


    if ($_FILES['image']['error'] != 4) {

        //verifivation de l'input file : picture
        //je stock dans une variable intermédiaire le resultat de la méthode verifyImage()
        $resultTestImage = Form::verifyImg('image', $paramUpload);
        if ($resultTestImage['permissionToUpload'] === false) {
            $errors['image'] = $resultTestImage['errorMessage'];
        }
    }

    if (!isset($_POST['departement'])) {
        $errors['departement'] = 'champ obligatoire';
    }


    if (!isset($_POST['type'])) {
        $errors['type'] = "Champ obligatoire";
    }

    if (!isset($_POST['distance'])) {
        $errors['distance'] = "Champ obligatoire";
    }



    if (count($errors) == 0) {
        $name = htmlspecialchars($_POST['name']);
        $start = htmlspecialchars($_POST['start']);
        $end = htmlspecialchars($_POST['end']);
        $date = htmlspecialchars($_POST['date']);
        $nblimitParticipant = intval($_POST['nblimitParticipant']);
        $description = htmlspecialchars($_POST['description']);
        if ($_FILES['image']['error'] == 4) {
            $image = base64_encode(file_get_contents('../assets/imageDefaut/imgdefault.png'));
        } else {
            $resultToUpload = Form::uploadImage('image', $paramUpload);
            $image = Form::convertImagetoBase64($paramUpload['directory'] . $resultToUpload['imageName']);
        }



        $place = htmlspecialchars($_POST['place']);
        $departement = intval($_POST['departement']);
        $type = intval($_POST['type']);
        $distance = intval($_POST['distance']);


        $eventCreate = new Events();

        $eventCreate->createEvent($name, $date, $start, $end, $nblimitParticipant, $description, $distance, $image, $place, $departement, $type);

        

        // creation d'une variable de session swal
        $_SESSION['swal'] = [
            'icon' => 'success',
            'title' => 'Enregistrement',
            'text' => 'La course à bien été enregistré'
        ];


        header('Location: ./courses.php');
        exit();
    }
}
