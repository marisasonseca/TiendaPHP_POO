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
                
                // save images
                if($_FILES['image']) {

                    $file = $_FILES['image'];
                    $fileName = $file['name'];
                    $fileType = $file['type'];

                    if ($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/gif'){
                        if(! is_dir('upload/images')) {
                            mkdir('upload/images', 0777, true);
                        }

                        $product->setImage($fileName);
                        move_uploaded_file($file['tmp_name'], 'upload/images/'. $fileName);
                    }
                }

                if (isset($_GET) && !empty($_GET)) {
                    $id = isset($_GET['id']) ? $_GET['id'] : false;
                    $product->setId($id);
                    $save = $product->edit();

                }else {
                    $save = $product->save();
                }
    
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

    public function edit()
    {
        if (isset($_GET) && !empty($_GET)) {
            
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            $edit = true;

            $product = new Product();
            $product->setId($id);
            $prod = $product->getOne();

            require_once 'views/product/create.php';
        }
    }
    
    public function delete()
    {
        Utils::isAdmin();

        if(isset($_GET) && !empty($_GET)){

            $id = isset($_GET['id']) ? $_GET['id'] : false;

            $produt = new Product();
            $produt->setId($id);
            $delete = $produt->delete();
            if($delete) {
                $_SESSION['delete'] = 'Complete';
            } else {
                $_SESSION['delete'] = 'Failed';
                echo 'fallo';
            }

        } else {
            $_SESSION['delete'] = 'Failed';
        }
        
        header('Location:'.BASE_URL.'product/management');
    }
}