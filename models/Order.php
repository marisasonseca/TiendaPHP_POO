<?php

require_once 'config/DataBase.php';

class Order 
{
    private $id;
    private $id_user;
    private $province;
    private $location;
    private $address;
    private $cost;
    private $state;
    private $date;
    private $hour;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
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
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of province
     */ 
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */ 
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of cost
     */ 
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set the value of cost
     *
     * @return  self
     */ 
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

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
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of hour
     */ 
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set the value of hour
     *
     * @return  self
     */ 
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getId_user()}, '{$this->getProvince()}', '{$this->getLocation()}', 
        '{$this->getAddress()}', {$this->getCost()}, 'confirm', CURDATE(), CURTIME());";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if($save) {
            $result = true;
        }else {
            $result = false;
        }

        return $result;
    }

    public function save_lines()
    {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $order = $this->db->query($sql);

        $order_id = $order->fetch_object()->pedido;

        foreach ($_SESSION['cart'] as $element) {

            $product = $element['product'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$order_id}, {$product->id}, {$element['units']});";
        
            $save = $this->db->query($insert);

        }
        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }
    
    public function GetOneByUser()
    {
        $sql = "SELECT * FROM pedidos
                WHERE id_usuario = {$this->getId_user()}
                ORDER BY id DESC LIMIT 1;";
        
        $order = $this->db->query($sql);

        return $order->fetch_object();
    }

    public function getAllProductsByUser($id)
    {
        $sql = "SELECT p.*, lp.units FROM productos p
                INNER JOIN lineas_pedidos lp ON p.id = lp.id_producto 
                where lp.id_pedido = {$id}";
        
        $products = $this->db->query($sql);
        
        return $products;    
    }

    public function getAllByUser()
    {
        $sql = "SELECT * FROM pedidos
                WHERE id_usuario = {$this->getId_user()}
                ORDER BY id DESC;";
        
        $orders = $this->db->query($sql);

        return $orders;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM pedidos
                WHERE id = {$this->getId()};";
        
        $order = $this->db->query($sql);

        return $order->fetch_object();
    }

    public function getAll() 
    {
        $sql = "SELECT * FROM pedidos
                ORDER BY id DESC;";
        
        $orders = $this->db->query($sql);
        return $orders;
    }

    public function update()
    {
        $sql = "UPDATE pedidos set state = '{$this->getState()}'
                WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }else {
            $result = false;
        }

        return $result;
    }
}