<?php

class Inscription extends DataBase
{

    private int $_inscription_id;
    private int $_inscription_validate;
    private int $_user_id_user;
    private int $_event_id_events;



    public function getInscriptionId()
    {
        return $this->_inscription_id;
    }

    public function setInscriptionId(int $id)
    {
        $this->_inscription_id = $id;
    }
    public function getInscriptionValidate()
    {
        return $this->_inscription_validate;
    }

    public function setInscriptionValidate(string $validate)
    {
        $this->_inscription_validate = $validate;
    }
    public function getUserIdUser($idUser)
    {
        return $this->_user_id_user;
    }

    public function setUserIdUser(int $idUser)
    {
        $this->__user_id_user = $idUser;
    }
    public function getEventIdEvent($idEvent)
    {
        return $this->_event_id_events;
    }

    public function setEventIdEvent(string $idEvent)
    {
        $this->_inscription_validate = $idEvent;
    }






    /***
     * permet de s'incrire à une course
     * 
     */


    public function inscriptionRace(int $idUser, int $idEvent)
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO inscription_race (`user_id_user`, `event_id_events`) values (:idUser, :idEvent)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_STR);

        $query->execute();
    }



    /***
     * permet de compter le nombre de participant à la course
     */

    public function countParticipant(int $idEvent)
    {
        $pdo = parent::connectDb();

        $sql = "SELECT COUNT(inscription_validate) as nbParticipant FROM inscription_race WHERE  event_id_events= :idEvent";

        $query = $pdo->prepare($sql);

        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

        $query->execute();

        $result = $query->fetch();

        return $result;
    }



    /**
     * fonction qui permet d'afficher toutes les personnes inscrit à une course
     * @param idEvent 
     * return un tableau
     */

    public function getParticipantRace($idEvent): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT user_pseudo, inscription_id, inscription_validate, user_id FROM inscription_race 
    inner join user on user_id_user = user_id
    WHERE event_id_events= :idEvent
    ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }




    /**
     * fonction qui permet de savoir si l'user est inscription ou non à la course
     * @param idEvent recuperre l'id de l'event
     * @param idUser recuperre l'id du user
     * return un tableau
     */
    function checkInscription(int $idEvent, int $idUser)
    {
        //création d'une instance pdo via la fonction du parent 
        $pdo = parent::connectDb();
        //j'écris la requête me permettant d'aller chercher le mail dans la table users
        //je mets en place un marqueur nominatif :mail
        $sql = "SELECT * FROM `inscription_race` WHERE `user_id_user` = :idUser and `event_id_events` =:idEvent";


        //je prépare la requête que je stock dans $query à l'aide de la méthode -> prepare()
        $query = $pdo->prepare($sql);

        //je lie la valeur du paramètre $mail au nominatif :mail à l'aide de la méthode->bindValue
        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);


        $query->execute();
        //je stock dans $result les données récupèrées à l'aide de la méthode->fetchAll()
        //afin de ne pas avoir d'erreur lorsque qu'on nous allons compter le tableau
        $result = $query->fetchAll();

        //je fais un test pour savoir si $result: si vide il n'est pas inscrit donc false
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }



    /**
     * permet de suppruimer un participant d'une course
     */
    public function deleteParticipant(int $idUser, int $idEvent)
    {

        $pdo = parent::connectDb();

        $sql = "DELETE FROM inscription_race WHERE user_id_user= :idUser and event_id_events= :idEvent";

        $query = $pdo->prepare($sql);

        //je lis la valeur du parametre (ex: id) un marqueur nominatif :id à l'aide de la méthode-> bindValue();
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

        $query->execute();
    }


    /**
     * cette méthode permet de verifier la participation desz users
     * @param int $idEvent l'id de l'event
     */

    public function checkValidateParticipation(int $idEvent)
    {
        var_dump($idEvent);
        //création d'une instance pdo via la fonction du parent 
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `inscription_race` WHERE `event_id_events`= :idEvent AND `inscription_validate` = 1";
        //je prépare la requête que je stock dans $query à l'aide de la méthode -> prepare()
        $query = $pdo->prepare($sql);
        //je lie la valeur du paramètre $mail au nominatif :mail à l'aide de la méthode->bindValue
        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
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
     * permet de valider la participation de l'utilisateur à une course
     * @param int $idParticipation l'id de l'utilisateur inscrit à la course
     * @param int $value  correspond à la valeur qui permet de valider la course 0 pas valider 1 valider
     * 
     */

    public function validateParticipation(int $idPartcipation, int $value)
    {
        $pdo = parent::connectDb();
        $sql = "UPDATE inscription_race SET inscription_validate =:value WHERE inscription_id = :idPartcipation";
        $query = $pdo->prepare($sql);
        $query->bindValue(':idPartcipation', $idPartcipation, PDO::PARAM_INT);
        $query->bindValue(':value', $value, PDO::PARAM_INT);

        $query->execute();
    }




/***
 * permet d'afficher tout les users qui participe à une course
 * @param int $idUser correspond à l'id des utilisateur qui sont inscrit à la course
 */

    public function getAllUserParticipation(int $idUser)
    {
        $pdo = parent::connectDb();
        $sql = "SELECT inscription_id, inscription_validate, event_id, user_id , event_name, event_distance, event_date, category_type FROM inscription_race
        inner join user on user_id_user = user_id
        inner join events on event_id_events = event_id
        inner join categories on category_id_categories = category_id
        WHERE inscription_race.user_id_user= :idUser";
        $query = $pdo->prepare($sql);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }



/**
 * methode qui permet de faire la somme des kilometres valider par le proprio de la course envers les personnes inscrites à sa course
 * @param $idUser correspond à l'id de l'utilisateur 
 */

    public function getSumKmValidate($idUser)
    {
        $pdo = parent::connectDb();
        $sql = "SELECT SUM(event_distance) AS totalKm FROM events
        INNER JOIN inscription_race ON  event_id_events = event_id
         WHERE inscription_race.user_id_user=:idUser AND inscription_validate=1";

        $query = $pdo->prepare($sql);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        return $result;
        
    }

    public function getCountEvent($idUser)
    {
        $pdo = parent::connectDb();
        $sql = "SELECT COUNT(user_id_user) as totalEvent from events
        where user_id_user=:idUser and event_visible=1";

        $query = $pdo->prepare($sql);
        $query->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        return $result;
        
    }

}