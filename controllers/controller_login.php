
<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

$errors = [];
$regexName = "/^[a-zA-Z]+$/";



if(isset($_POST['login'])){
    
    if(empty($_POST['login'])){
        $errors['login'] = "champ obligatoire";
    
    }
}


if(isset($_POST['password'])){
    if(empty($_POST['password'])){
        $errors['password'] = "champ obigatoire";
}

}


if(count($errors)==0){
    $userObj = new User();

    if($userObj->checkIfMailExists($_POST['login']))
    {   
        //je recupere toutes les info de l'utilisateur pour ensuite les stocker dans une variable $userinfos à l'aide du mail.
        $userInfos = $userObj->getInfoUser($_POST['login']);

        //je recupere le mdp hashé dans le tableau $userinfos
        //j'utilise ensuite la fonction password_verify pour verifier le mdp hashé
        if(password_verify($_POST['password'], $userInfos['user_password']))
        {
            $_SESSION['user'] = $userInfos;
            // unset() permet de supprimer les infos qu'on ne souhaite pas voire dans la variables de session
            unset($_SESSION['user']['user_password']);
            unset($_SESSION['user']['role_id_role']);
            unset($_SESSION['user']['token_value']);
            unset($_SESSION['user']['token_date']);

            header('Location: home.php');
        }else{
            $errors['connection'] = "Identifiant ou Mot de passe incorrect";
        }
       
        
    } else{
        $errors['connection'] = "Identifiant ou Mot de passe incorrect";
        }
}
}

?>