<?php

class Utils
{
    public static function deleteSession($name) {

        if(isset($_SESSION[$name])) {
            $_SESSION[$name] == null;
            unset($_SESSION[$name]);
        }
    }
    /**
     * Vefifica los datos que llegan del formulario
     */
    public static function verifyDate($data)
    {
        $valid = false;
        if ($data == 'name' or $data == 'lastName') {
            if (empty($_POST[$data]) && (! is_numeric($data)) && (!preg_match('/[0-9]', $data))) {
                $valid = true;
            } else {
                $valid = false;
            }
        }

        if ($data == 'email') {
            if(empty($_POST[$data]) && filter_var($data, FILTER_VALIDATE_EMAIL) ) {
                $valid = true;
            } else {
                $valid = false;
            }
        }

        if ($data == 'password') {
            if(empty($_POST[$data])){
                $valid = true;
            }  else {
                $valid =false;
            }
        }
        return $valid;
    }

    public static function isAdmin()
    {
        if(! isset($_SESSION['admin'])) {
            header('Location:' . BASE_URL);
        } else {
            return true;
        }
    }

    public static function showCategories()
    {
        require_once 'models/Category.php';
        $category = new Category();
        $categories = $category->getAll();
        return $categories;
    }

    public static function validDataObject($object, $value)
    {
        $result = '';
        if (isset($object) && is_object($object)) {
            $result = $object->$value;
        } else {
            $result = '';
        }
        return $result;
    }
}