<?php

require_once 'models/User.php';

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
            $user = new User();
            $user->setName($_POST['name']);
            $user->setLastname($_POST['lastName']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            
            $save = $user->save();

            if($save){
                $_SESSION['register'] = 'Register Complete';
            } else {
                echo 'No Guardo';
                $_SESSION['register'] = 'Register Failed';
            }
        }

        header("Location:".BASE_URL.'user/register');

    }
}