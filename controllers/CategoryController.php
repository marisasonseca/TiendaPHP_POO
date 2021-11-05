<?php

require_once 'models/Category.php';

class CategoryController
{
    public function index()
    {
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();
        require_once 'views/category/index.php';
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