<?php


class departement extends DataBase
{
    private int $_department_id;
    private string $_departement_name;


    public function getDepartmentId()
    {
        return $this->_department_id;
    }
    public function setDepartmentId(int $id)
    {
        $this->_department_id = $id;
    }

    public function getDepartmentName()
    {
        return $this->_departement_name;
    }
    public function setDepartmentName(string $name)
    {
        $this->_department_name = $name;
    }



    public function getDepartmentNormandie()
    {
        $pdo =parent::connectDb();
        $sql = "SELECT * FROM departement";
        $query =$pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }


}