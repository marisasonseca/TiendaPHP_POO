<?php

require_once 'config/DataBase.php';

class Product 
{
    private $id;
    private $idCategory;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $ofert;
    private $date;
    private $image;
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
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of idCategory
     */ 
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     * @return  self
     */ 
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
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
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $this->db->escape_string($name);
        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $this->db->escape_string($description);
        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $this->db->escape_string($price);
        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $this->db->escape_string($stock);
        return $this;
    }

    /**
     * Get the value of ofert
     */ 
    public function getOfert()
    {
        return $this->ofert;
    }

    /**
     * Set the value of ofert
     * @return  self
     */ 
    public function setOfert($ofert)
    {
        $this->ofert = $this->db->escape_string($ofert);
        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $this->db->escape_string($date);
        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos ORDER BY id DESC;";
        $products = $this->db->query($sql);

        return $products;
    }

    public function save()
    {
        $sql = "INSERT INTO productos 
               VALUES(NULL, '{$this->getIdCategory()}', '{$this->getName()}', '{$this->getDescription()}', 
               {$this->getPrice()}, {$this->getStock()}, NULL, CURDATE(), '{$this->getImage()}');";

        $save = $this->db->query($sql);

        $result = false;
        if($save) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}