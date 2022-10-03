
<?php
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/User.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $regexName = "/^[a-zA-Z]+$/";


    if (isset($_POST['newPassword'])) {
        if ($_POST['newPassword'] == '') {
            $errors['newPassword'] = "*Champ obligatoire";
        } else if ($_POST['newConfirmPassword'] == '' && $_POST['newConfirmPassword'] != '') {
            $errors['newConfirmPassword'] = "*Chanmp obligatoire";
        } else if ($_POST['newConfirmPassword'] != $_POST['newPassword']) {
            $errors['newPassword'] = "*Les  mots de passe sont différents";
        }







        if (count($errors) == 0) {
            $testObj = new user();

            $test = $testObj->validateToken($_GET['token'], 7200);
            if ($test == true) {
                $password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $token = $_GET['token'];
                $testObj->updatePassword($token, $password);
            } else {
                $errors['newPassword'] = "*Le lien n'est plus valide";
            }
        }
        
    }
}

