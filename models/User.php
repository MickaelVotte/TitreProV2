<?php


class User extends DataBase
{
    private int $_user_id;
    private string $_user_firstname;
    private string $_user_lastname;
    private string $_user_birthday;
    private string $_user_mail;
    private string $_user_password;
    private int $_role_id_role;
    private string $_token_date;
    private string $_token_value;




    public function getUserId()
    {
        return $this->_user_id;
    }
    public function setUserId(int $id)
    {
        $this->_user_id = $id;
    }

    public function getUserFirstname()
    {
        return $this->_user_firstname;
    }
    public function setUserFirstname(string $firstname)
    {
        $this->_user_firstname = $firstname;
    }

    public function getUserlastname()
    {
        return $this->_user_lastname;
    }
    public function setUserlastname(string $lastname)
    {
        $this->_user_lastname = $lastname;
    }


    public function getUserAge()
    {
        return $this->_user_birthday;
    }
    public function setUserAge(string $birthday)
    {
        $this->_user_age = $birthday;
    }

    public function getUserMail()
    {
        return $this->_user_mail;
    }
    public function setUserMail(string $mail)
    {
        $this->_user_mail = $mail;
    }

    public function getUserPassword()
    {
        return $this->_user_password;
    }
    public function setUserPassword(string $password)
    {
        $this->_user_password = $password;
    }


    public function getRoleIdRole()
    {
        return $this->_role_id_role;
    }
    public function setRoleIdRole(int $idRole)
    {
        $this->_role_id_role = $idRole;
    }

    public function getTokenDate()
    {
        return $this->_token_date;
    }
    public function setTokenDate(string $date)
    {
        $this->_token_date = $date;
    }

    public function getTokenValue()
    {
        return $this->_token_value;
    }
    public function setTokenValue(string $value)
    {
        $this->_token_value = $value;
    }





    /**
     * fonction permettant de savoir si un mail est present dans la table
     * @param string $mail : Mail à rechercher
     * @return boolean
     */


    public function checkIfMailExists(string $mail)
    {
        //création d'une instance pdo via la fonction du parent 
        $pdo = parent::connectDb();
        //j'écris la requête me permettant d'aller chercher le mail dans la table users
        //je mets en place un marqueur nominatif :mail
        $sql = "SELECT `user_mail` FROM `user` WHERE `user_mail` = :mail";


        //je prépare la requête que je stock dans $query à l'aide de la méthode -> prepare()
        $query = $pdo->prepare($sql);

        //je lie la valeur du paramètre $mail au nominatif :mail à l'aide de la méthode->bindValue
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        //une fois le mail récupéré, j'execute la requête à l'aide de la méthode->execute()
        $query->execute();
        //je stock dans $result les données récupèrées à l'aide de la méthode->fetchAll()
        //afin de ne pas avoir d'erreur lorsque qu'on nous allons compter le tableau
        $result = $query->fetchAll();

        //je fais un test pour savoir si $result est vide
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkIfPseudoExists(string $pseudo)
    {
        //création d'une instance pdo via la fonction du parent 
        $pdo = parent::connectDb();
        //j'écris la requête me permettant d'aller chercher le mail dans la table users
        //je mets en place un marqueur nominatif :mail
        $sql = "SELECT `user_pseudo` FROM `user` WHERE `user_pseudo` = :pseudo";


        //je prépare la requête que je stock dans $query à l'aide de la méthode -> prepare()
        $query = $pdo->prepare($sql);

        //je lie la valeur du paramètre $mail au nominatif :mail à l'aide de la méthode->bindValue
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        //une fois le mail récupéré, j'execute la requête à l'aide de la méthode->execute()
        $query->execute();
        //je stock dans $result les données récupèrées à l'aide de la méthode->fetchAll()
        //afin de ne pas avoir d'erreur lorsque qu'on nous allons compter le tableau
        $result = $query->fetchAll();

        //je fais un test pour savoir si $result est vide
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }








    /**
     * focntion qui permettant d'ajouter un utilisateur dans la bdd
     * @param string $firstname prenom de l'utilisateur
     * @param string $lastname nom de l'utilisateur
     * @param string $pseudo nom de pseudo
     * @param string $age age de l'utilisateur
     * @param string $mail email de l'utilisateur
     * @param string $password mot de passe de l'utilisateur
     */
    public function addUser(string $firstname, string $lastname, string $pseudo, string $birthday, string $mail, string $password): void
    {
        //création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        //j'écris  la requete qui va permettre d'ajouter un user;
        $sql = "INSERT INTO user (`user_firstname`, `user_lastname`, `user_pseudo` ,`user_birthday`,`user_mail`, `user_password`) VALUES (:firstname, :lastname, :pseudo, :birthday, :mail, :password)";


        //je prepare la requete que je stock dans query à l'aide de la méthode->prepare()
        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
    }




    /**
     * fonction qui permet d'avoir tous les information de l'utilisateur
     * @return un boolean
     */
    public function getInfoUser(string $mail): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `user` WHERE `user_mail` = :mail";
        $query = $pdo->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * fonction qui de recuperer les information d'un utilisateur de la bdd
     * @param array retourne un tableau associatif
     */


    public function getOneCoureur($id): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM user WHERE `user_id` = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }



    /**
     * fonction qui permet de modifier l'utilisateur de la bdd
     * @param string $lastname nom de l'utilisateur
     * @param string $firstname prenon de l'utilisateur
     * @param string $pseudo de l'utilisateur
     * @param string $age age de l'utilisateur
     * @param string $mail email de l'utilisateur
     * @param string $idUser l'id de l'utilisateur
     */

    public function updateUser($lastname, $firstname, $pseudo, $birthday, $mail, $idUser)
    {
        $pdo = parent::connectDb();
        $sql = "UPDATE user SET user_firstname = :firstname, user_lastname = :lastname, user_pseudo = :pseudo, user_birthday = :birthday, user_mail = :mail
        WHERE user_id = :id ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':id', $idUser, PDO::PARAM_INT);

        $query->execute();
    }




    /**
     *  fonction qui permet de créer un token 
     *  @param string $tokenDate la date de création du  token
     *  @param string  $tokenValue va generer une valeur aleatoire qui correspondra à la valeur du token,
     *  @param string  $mail email de l'utilisateur
     */

    public function createToken($tokenDate, $tokenValue, $mail)
    {
        $pdo = parent::connectDb();
        $sql = "UPDATE user SET token_date = :tokenDate, token_value = :tokenValue WHERE user_mail = :mail";
        $query = $pdo->prepare($sql);

        $query->bindValue(':tokenDate', $tokenDate, PDO::PARAM_STR);
        $query->bindValue(':tokenValue', $tokenValue, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();
    }





    /**
     * fonction qui permet de valider le token nouvellement créer 
     * @param array tableau associatif
     * 
     */

    public function validateToken($token, $jetlag)
    {
        $pdo = parent::connectDb();
        $sql = "SELECT token_date FROM user where token_value = :tokenValue";
        $query = $pdo->prepare($sql);

        $query->bindValue(':tokenValue', $token, pdo::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll();

        //je fais un test pour savoir si $result est vide
        if (count($result) != 0) {
            //je stock la date du token dans une variable
            $tokenDate = $result[0]['token_date'];
            //strtotime()permet de convertir une date en timestamp
            $timestamp = strtotime($tokenDate);
            //abs()retourne la valeur absolue d'un nombre
            // decalage horraire - timestamp de la date
            $diffTime =    abs(time() + $jetlag - $timestamp);
            //convertir en minutes, le token sera valide d'une durée de 30min
            return $diffTime < 60 * 30 ? true : false;
        } else {
            return false;
        }
    }



    /**
     * fonction qui va permettre de modifier le password
     *   
     */

    public function updatePassword($tokenValue, $password)
    {
        $pdo = parent::connectDb();
        $sql = "UPDATE user SET user_password= :password WHERE token_value = :tokenValue";
        $query = $pdo->prepare($sql);

        $query->bindValue(':tokenValue', $tokenValue, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
    }

    /**
     * fonction qui permet de supprimer l'utilisateur de la bdd 
     * 
     * 
     */

    public function deleteUser($userId)
    {
        //requete qui permet changer l'etat de la course passant de 1 à 0 et changer le proprio de la course(anonyme proprio);

        $pdo = parent::connectDb();

        $sqlA = "UPDATE events SET event_validate = 0, user_id_user = 23 WHERE user_id_user = :userId";

        $queryA = $pdo->prepare($sqlA);

        $queryA->bindValue(':userId', $userId, PDO::PARAM_INT);

        $queryA->execute();

    


        // fonction qui permet de supprimer l'utilisateur de la bdd 

        $sql = "DELETE FROM user WHERE user_id = :id";

        $query = $pdo->prepare($sql);

        //je lis la valeur du parametre (ex: id) un marqueur nominatif :id à l'aide de la méthode-> bindValue();
        $query->bindValue(':id', $userId, PDO::PARAM_INT);
        $query->execute();
    }
}
