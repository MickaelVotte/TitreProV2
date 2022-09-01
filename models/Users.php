<?php


class Users extends DataBase
{
  private int $_user_id;
  private string $user_firstname;
  private string $user_lastname;
  private int $_user_age;
  private string $_user_mail;
  private string $_password;
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








    /**
     * fonction permettant de savoir su un mail est present dans la table
     * @param string $mail : Mail à rechercher
     * @return boolean
     */


  public function checkIfMailExists(string $mail)
  {
      //création d'une instance pdo via la fonction du parent 
      $pdo = parent::connectDb();
      //j'écris la requête me permettant d'aller chercher le mail dans la table users
      //je mets en place un marqueur nominatif :mail
      $sql = "SELECT `users_mail` FROM `users` WHERE `users_mail` = :mail";


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


}
