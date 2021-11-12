<?php

require_once 'config/DataBase.php';
class Category 
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM categorias ORDER BY id DESC ;";
        $categories = $this->db->query($sql);

        return $categories;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()};";
        $category = $this->db->query($sql);

        return $category->fetch_object();
    }

    public function save()
    {
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getName()}');";
        $save = $this->db->query($sql);
    
        $result = false;
        if ($save) {
            $result = true;
        }

        var_dump($result);
        exit();

        return $result;
    }
}