<?php


class User extends DataBase
{
    private int $_user_id;
    private string $_user_firstname;
    private string $_user_lastname;
    private int $_user_age;
    private string $_user_mail;
    private string $_user_password;
    private int $_role_id_role;
    private string $_name_role;



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
        return $this->_user_age;
    }
    public function setUserAge(int $age)
    {
        $this->_user_age = $age;
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

    public function getNameRole()
    {
        return $this->_name_role;
    }
    public function setNameRole(string $nameRole)
    {
        $this->_name_role=$nameRole;
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





    /**
     * focntion qui permettant d'ajouter un utilisateur dans la bdd
     * @param string $firstname prenom de l'utilisateur
     * @param string $lastname nom de l'utilisateur
     * @param string $age age de l'utilisateur
     * @param string $mail email de l'utilisateur
     * @param string $password mot de passe de l'utilisateur
     */
    public function addUser(string $firstname, string $lastname, string $age, string $mail, string $password): void
    {
        //création d'une instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        //j'écris  la requete qui va permettre d'ajouter un user;
        $sql = "INSERT INTO user (`user_firstname`, `user_lastname`, `user_age`,`user_mail`, `user_password`) VALUES (:firstname, :lastname, :age, :mail, :password)";


        //je prepare la requete que je stock dans query à l'aide de la méthode->prepare()
        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);

        $query->execute();
    }




    /**
     * fonction qui permet d'avoir tous les information de l'utilisateur
     * @return un boolean
     */
    public function getInfoUser(string $mail): array{
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `user` WHERE `user_mail` = :mail";
        $query =$pdo->prepare($sql);
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


    public function updateUser($lastname, $firstname, $age, $mail, $idUser)
    {
        $pdo=parent::connectDb();
        $sql="UPDATE user SET user_firstname = :firstname, user_lastname = :lastname, user_age = :age, user_mail = :mail
        WHERE user_id = :id ";

        $query= $pdo->prepare($sql);

        $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindValue(':age', $age, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':id', $idUser, PDO::PARAM_INT);

        $query->execute();

    }
}
