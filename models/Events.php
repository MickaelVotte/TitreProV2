<?php
class Events extends Database
{
    private int $_editEvent_id;
    private string $_editEvent_name;
    private string $_editEvent_date;
    private  string $_editEvent_start;
    private string $_editEvent_end;
    private int $_editEvent_limitParticpant;
    private  string $_editEvent_description;
    private string $_editEvent_image;
    private string $_editEvent_place;




    public function getEditEventId()
    {
        return $this->_editEvent_id;
    }
    public function setEditEventId(int $id)
    {
        $this->_doctor_id = $id;
    }



    public function getEditEventName()
    {
        return $this->_editEvent_name;
    }
    public function setEditEventName(string $name)
    {
        $this->_doctor_name = $name;
    }


    public function getEditEventDate()
    {
        return $this->_editEvent_date;
    }
    public function setEditEventDate(string $date)
    {
        $this->_doctor_date = $date;
    }


    public function getEditEventStart()
    {
        return $this->_editEvent_start;
    }
    public function setEditEventStart(string $start)
    {
        $this->_doctor_start = $start;
    }

    public function getEditEventEnd()
    {
        return $this->_editEvent_end;
    }
    public function setEditEventEnd(string $end)
    {
        $this->_doctor_end = $end;
    }

    public function getEditEventLimitParticipant()
    {
        return $this->_editEvent_limitParticpant;
    }
    public function setEditEventLimitParticipant(string $limitParticipant)
    {
        $this->_editEvent_limitParticpant = $limitParticipant;
    }

    public function getEditEventDescription()
    {
        return $this->_editEvent_description;
    }
    public function setEditEventDescription(string $description)
    {
        $this->_editEvent_description = $description;
    }

    public function getEditEventImage()
    {
        return $this->_editEvent_image;
    }
    public function setEditEventImage(string $image)
    {
        $this->_editEvent_image = $image;
    }


    public function getEditEventPlace()
    {
        return $this->_editEvent_place;
    }
    public function setEditEventPlace(string $place)
    {
        $this->_editEvent_place = $place;
    }





    public function createEvent(string $name, string $date, string $start, string $end, int $limitParticipant, string $description, string $distance, string $image, string $place, int $departement, int $type): void
    {
        //création d'un instance pdo via la fonction du parent
        $pdo = parent::connectDb();

        //j'écris la requete qui va me permettre d'ajouter un client;
        $sql = "INSERT INTO events (`event_name`, `event_date`, `event_start`, `event_end`, `event_limitmembers`, `event_description`, `event_distance`,`event_image`, `event_place`, `departement_id_departement`, `category_id_categories`,`user_id_user`) values (:name, :date, :start, :end, :limitmembers, :description, :distance, :image, :place, :departement, :type, :userId)";

        ///je prepare la requete que je stock dans query à l'aide dela méthode->prepare()
        //une requete preparee est à priiviligier lorsque nous recuperons des données rentrées par l'utilisateur
        $query = $pdo->prepare($sql);

        //je lis la valeur du parametre (ex: name, date etc) un marqueur nominatif :name à l'aide de la méthode->bindValue();
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':start', $start, PDO::PARAM_STR);
        $query->bindValue(':end', $end, PDO::PARAM_STR);
        $query->bindValue(':limitmembers', $limitParticipant, PDO::PARAM_INT);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':image', $image, PDO::PARAM_STR);
        $query->bindValue(':place', $place, PDO::PARAM_STR);
        $query->bindValue(':departement', $departement, PDO::PARAM_INT);
        $query->bindValue(':type', $type, PDO::PARAM_INT);
        $query->bindValue(':distance', $distance, PDO::PARAM_STR);
        $query->bindValue(':userId', $_SESSION['user']['user_id'], PDO::PARAM_INT);

        //une fois les information recupere, j'execute la requte à l'aide de la méthode->execute()
        $query->execute();
    }




    /**
     * permet de recuperer tous les courses
     * @return array tableau associatif
     */

    public function getAllEvent(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM events 
        inner join categories on category_id=category_id_categories
        inner join departement on departement_id=departement_id_departement ";

        $query = $pdo->query($sql);

        $result = $query->fetchAll();

        return $result;
    }


    /**
     * permet de recuperer les infos d'une course
     * @return array tableau associatif
     */


    public function getOneCourse($id): array
    {
        //creation d'une instance pdo via la function du parent
        $pdo = parent::connectDb();

        $sql = "SELECT * FROM events 
         inner join categories on category_id=category_id_categories
        inner join departement on departement_id=departement_id_departement
        inner join user on user_id=user_id_user
        WHERE `event_id` = :id
         ";

        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
