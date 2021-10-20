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

            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setPassword($password);

            $save = $user->save();

            if($save) {
                $_SESSION['register'] = 'Registration Complete';
            } else {
                $_SESSION['register'] = 'Registration Failed1';
            }
            
        } else {
            $_SESSION['register'] = 'Registration Failed1';
        }
        header('Location:' . BASE_URL . 'user/register');
    }
}