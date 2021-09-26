<?php
    require_once 'autoload.php';
    require_once 'views/layout/header.php';
    require_once 'views/layout/sidebar.php';

    if(isset($_GET['controller'])){
        $nameController = $_GET['controller'].'controller';
    
    }else {
        echo '<h4>Error 404, tu pagina no existe bebe xD</h4>';
        exit();
    }

    if(isset($nameController) && class_exists($nameController)){

        $controller = new $nameController;

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){

            $action = $_GET['action'];
            $controller->$action();
        }else {
            echo'<h4>Error 404, tu pagina no existe bebe xD</h4>';
        }
        
    } else {
        echo'<h4>Error 404, tu pagina no existe bebe xD</h4>';
    }

    require_once 'views/layout/footer.php'
?>