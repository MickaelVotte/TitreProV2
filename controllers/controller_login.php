
<?php


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
}

?>