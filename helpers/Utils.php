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

    public static function isLogin()
    {
        if(! isset($_SESSION['identity'])) {
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

    public static function debugDate($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
    }

    public static function statsCart()
    {
        $stats = [
            "count" => 0,
            "total" => 0
        ];

        if(isset($_SESSION['cart'])){
            // $cart = $_SESSION['cart'];
            $stats['count'] = count($_SESSION['cart']);
            foreach ($_SESSION['cart'] as $product) {

                // $product = $element['product'];
                $stats['total'] += $product['price'] * $product['units'];
            }

        }
        return $stats;
    }

    public static function formatMoney($value)
    {
        $result = number_format($value, 0, '', '.');
        return $result;
    }

    public static function showOrderState($status)
    {
        $value = "Pending";
        if($status == 'confirm') {

            $value = "Pending";

        }elseif ($status == 'preparation'){
           
            $value = "In preparation"; 
        
        }elseif ($status == 'ready'){
            
            $value = "Ready to Send";
        
        }elseif ($status == 'sended'){
            $value = "Sent";
            
        }
        
        return $value;
    }
}