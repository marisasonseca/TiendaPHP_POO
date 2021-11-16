<?php 
require_once 'models/Product.php';

class CartController
{
    public function index()
    {
        if(isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            // Utils::debugDate($_SESSION['cart']);
        }
        require_once 'views/cart/index.php';
    }

    public function add()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id_product = $_GET['id'];
        
        } else {
            header('Location:' . BASE_URL);
        }

        if(isset($_SESSION['cart'])) {

            $counter = 0;
            foreach ($_SESSION['cart'] as $index => $element) {
                if($element['product_id'] == $id_product ) {
                    $_SESSION['cart'][$index]['units']++;
                    $counter++;
                }
            }
        }

        if(! isset($counter) || $counter == 0) {
            $product = new Product();
            $product->setId($id_product);
            $produ = $product->getOne();
            
            if(is_object($produ)) {
                $_SESSION['cart'][] = [
                    "product_id" => $produ->id,
                    "price" => $produ->price,
                    "units" => 1,
                    "product" => $produ
                ];
            }
        }
            
        header("Location:". BASE_URL.'cart/index');

        
    }

    public function remove()
    {
        
    }

    public function deleteAll()
    {
        unset($_SESSION['cart']);
        header('Location:' . BASE_URL . 'cart/index');
    }
}