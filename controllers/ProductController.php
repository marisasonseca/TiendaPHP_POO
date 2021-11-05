<?php

require_once 'models/Product.php';

class ProductController
{
    public function index()
    {
        // Mostrar los productos
        require 'views/product/featured.php';
    }

    public function management()
    {
        Utils::isAdmin();
        $product = new Product();
        $products = $product->getAll();
        require 'views/product/management.php';
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/product/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if(isset($_POST) && !empty($_POST)) {
            
            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            // $image = isset($_POST['image']) ? $_POST['image'] : false;
            
            if($name && $description && $price && $stock && $category) {

                $product = new Product();
                $product->setName($name);
                $product->setDescription($description);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setIdCategory($category);
                
                $save = $product->save();
    
                if ($save) {
                    $_SESSION['product'] = 'Complete';
                } else {
                    $_SESSION['product'] = 'Faile';
                }
            } else {
                $_SESSION['product'] = 'Faile';
            }

        }else {
            $_SESSION['product'] = 'Faile';
        }
        header('Location:'. BASE_URL. 'product/management');
    }
}