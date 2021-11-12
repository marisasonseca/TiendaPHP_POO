<?php

require_once 'models/Category.php';
require_once 'models/Product.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();
        require_once 'views/category/index.php';
    }

    public function view()
    {
        if(isset($_GET) && !empty($_GET)) {
            $id = isset($_GET['id']) ? $_GET['id'] : false;
            // Traer categoria
            $category = new Category();
            $category->setId($id);
            $cate = $category->getOne();

            // Traer productos (traer los productos que tengan esta categoria)
            $product = new Product();
            $product->setIdCategory($id);
            $products = $product->getAllCategory();
        }
        
        require_once 'views/category/view.php';
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['name']) && !empty($_POST['name'])) {
            $name = $_POST['name'];

            $category = new Category();
            $category->setName($name);
            $save = $category->save();
        }
        header('Location:' . BASE_URL . 'category/index');
    }
}