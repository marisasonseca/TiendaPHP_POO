<?php

class ProductController
{
    public function index()
    {
        // Mostrar los productos
        require 'views/products/featured.php';
    }
}