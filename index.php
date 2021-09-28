<?php
    require_once 'autoload.php';
    require_once 'config/parameters.php';
    require_once 'views/layout/header.php';
    require_once 'views/layout/sidebar.php';

    function showError()
    {
        $error = new ErrorController();
        $error->index();
    }

    if(isset($_GET['controller'])){
        $nameController = $_GET['controller'].'controller';
    
    }elseif (!isset($_GET['controller']) && (!isset($_GET['action']))){

        $nameController = CONTROLLER_DEFAULT;

    }else {
        showError();
    }

    if(isset($nameController) && class_exists($nameController)){

        $controller = new $nameController;

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){

            $action = $_GET['action'];
            $controller->$action();
        }elseif (!isset($_GET['controller']) && (!isset($_GET['action']))){
            $action_default = ACTION_DEFAULT;
            $controller->$action_default();

        }else {
            showError();
        }
        
    } else {
        showError();
    }

    require_once 'views/layout/footer.php'
?>