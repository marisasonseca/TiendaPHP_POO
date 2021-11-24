<?php

require_once 'config/DataBase.php';

class User 
{
    private $id;
    private $name;
    private $lastName;
    private $email;
    private $password;
    private $type;
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
        $this->name = $this->db->real_escape_string($name);

        return $this;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */ 
    public function setLastName($lastName)
    {
        $this->lastName = $this->db->real_escape_string($lastName);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;
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

    public function save()
    {
        $query = "INSERT INTO usuarios 
                  VALUES(NULL, '{$this->getName()}', '{$this->getLastName()}', 
                  '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL)";

        $save = $this->db->query($query);
        echo $query;

        $result = false;
        if($save) {
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }
    
    public function login()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM usuarios WHERE email = '{$email}';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $user = $login->fetch_object();
            $verify = password_verify($password, $user->password);

            if($verify) {
                $result = $user; 
            }
        }

        return $result;
    }

}