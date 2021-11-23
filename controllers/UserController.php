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
            $password = isset($_POST['password']) && Utils::verifyDate($_POST['password']) ? $_POST['password'] : false;

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

    public function login()
    {
        if(isset($_POST)) {

            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new User();
                $user->setEmail($email);
                $user->setPassword($password);

                $identity = $user->login();

                if($identity && is_object($identity)){
                    $_SESSION['identity'] = $identity;

                    if($identity->type == 'admin'){
                        $_SESSION['admin'] = true;
                    }
                }else {
                    $_SESSION['errorLogin'] = 'Login Failure';
                }
                
            } else {
                $_SESSION['errorLogin'] = 'Login Failure';
            }

        } else {
            $_SESSION['errorLogin'] = 'Login Failure';
        }

        header('Location:' . BASE_URL);
    }

    public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		if(isset($_SESSION['cart'])){
			unset($_SESSION['cart']);
		}
		
		header("Location:".BASE_URL);
	}
}