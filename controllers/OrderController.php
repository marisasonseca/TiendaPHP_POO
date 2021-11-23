<?php
require_once 'models/Order.php';

class OrderController
{
    public function make()
    {
        require_once 'views/order/make.php';
    }

    public function add() 
    {   
        Utils::isLogin();
        if(isset($_POST) && !empty($_POST)){
            // id user session
            $user = $_SESSION['identity'];
            $user_id = $user->id;

            // form data
            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;

            //order cost
            $stats = Utils::statsCart();
            $cost = $stats['total'];

            if($province && $location && $address) {

                $order = new Order;
                $order->setId_user($user_id);
                $order->setProvince($province);
                $order->setLocation($location);
                $order->setAddress($address);
                $order->setCost($cost);
                
                // SAVE ORDER
                $save = $order->save();
                
                // SAVE ORDER LINE
                $save_line = $order->save_lines();

                if($save && $save_line) {
                    $_SESSION['order'] = "complete";
                } else {
                    $_SESSION['order'] = "failed1";
                }
                
            } else {
                $_SESSION['order'] = "failed2";
            }

            header("Location:".BASE_URL. "order/confirm");

        }else {
            header("Location:".BASE_URL);
        }
    }

    public function confirm()
    {
        // LOGUEADO/ ID_USER
        Utils::isLogin();
        $user = $_SESSION['identity'];
        $user_id = $user->id; 

        $order = new Order();
        $order->setId_user($user_id);

        // ORDER LAST
        $ord = $order->GetOneByUser();

        // ORDER PRODUCTS
        $order_product = new Order();
        $products = $order_product->getAllProductsByUser($ord->id);
        
        require_once 'views/order/confirm.php';
        
        // Datos del pedid-> numero, total a pagar

        // producto, tabla
    }

    

}