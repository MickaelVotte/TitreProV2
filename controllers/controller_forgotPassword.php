<?php 

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';



if($_SERVER['REQUEST_METHOD']== 'POST')
{
    
$errors = [];
$regexName = "/^[a-zA-Z]+$/";


if(isset($_POST['mail']))
{
    if(empty($_POST['mail'])){
        $errors['mail'] = "Veuillez entrez votre email";
    }
}



if(count($errors)==0)
{   
    $mail = htmlspecialchars($_POST['mail']);
    $forgotpasswordObj = new User();
    
    if($forgotpasswordObj->checkIfMailExists($mail)){

        $tokenValue = uniqid();
        date_default_timezone_set('Europe/Paris');
        $tokenDate = date("Y-m-d H:i:s");
    
        $forgotpasswordObj->createToken($tokenDate, $tokenValue, $mail);
        var_dump($tokenDate);
        echo"<p> Un mail à bien été envoyé à l'adresse renseigné <p> ";
        echo "<a href='modifyPassword.php?token=$tokenValue'>lien pour modifier le mot de passe </a>";
        
    }else{
        $errors['mail'] = "Nous avons pas d'utilisateur avec cette adresse";
    }

    
    
}


}