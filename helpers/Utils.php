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
}