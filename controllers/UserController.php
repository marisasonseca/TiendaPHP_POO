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

            $name = isset($_POST['name']) && Utils::verifyDate($_POST['name']) ? $_POST['name'] : false;
            $lastName = isset($_POST['lastName']) && Utils::verifyDate($_POST['lastName']) ? $_POST['lastName'] : false;
            $email = isset($_POST['email']) && Utils::verifyDate($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['email']) && Utils::verifyDate($_POST['email']) ? $_POST['email'] : false;

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setPassword($password);

            $save = $user->save();

            if($save) {
                $_SESSION['register'] = 'Complete Registration';
            } else {
                $_SESSION['register'] = 'Register failed';
            }
            
        } else {
            $_SESSION['register'] = 'Register failed';
        }
        header('Location:' . BASE_URL . 'user/register');
    } 
}