<?php


class Categories extends DataBase
{
    private int $_category_id;
    private string $_category_type;




    public function getCategoriesId()
    {
        return $this->_category_id;
    }
    public function setCategoriesId(int $id)
    {
        $this->_category_id = $id;
    }

    public function getCategoriesName()
    {
        return $this->_category_type;
    }
    public function setCategoriesName(string $type)
    {
        $this->category_type = $type;
    }




    public function getCategories()
    {
        $pdo=parent::connectDb();
        $sql = "SELECT * FROM categories";
        $query = $pdo->query($sql);
        $result = $query->fetchAll();
        return $result;
    }




}