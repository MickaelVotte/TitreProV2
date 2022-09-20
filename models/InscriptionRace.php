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


public function inscriptionRace(int $idUser,int $idEvent)
{
    $pdo = parent::connectDb();
    $sql ="INSERT INTO inscription_race (`user_id_user`, `event_id_events`) values (:idUser, :idEvent)";

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

    $sql="SELECT COUNT(inscription_validate) as nbParticipant FROM inscription_race WHERE inscription_validate=true AND event_id_events= :idEvent";

    $query = $pdo->prepare($sql);

    $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

    $query->execute();

    $result = $query->fetch();

    return $result;

}



/**
 * fonction qui permet d'afficher toutes les personnes inscrit à une course
 * return un tableau
 */

 public function getParticipantRace($idEvent):array
{
    $pdo = parent::connectDb();
    
    $sql="SELECT user_pseudo, user_id FROM inscription_race 
    inner join user on user_id_user = user_id
    WHERE event_id_events= :idEvent
    ";

    $query = $pdo->prepare($sql);

    $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

     $query->execute();

    $result = $query->fetchAll();

    return $result;

   
}



}
