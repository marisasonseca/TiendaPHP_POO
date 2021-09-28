<?php

class UserController
{
    public function index()
    {
        echo 'Controller User, Method index';
    }

    public function register()
    {
        require 'views/user/register.php';
    }

    public function save()
    {
        if(isset($_POST)){
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
        }
    }
}