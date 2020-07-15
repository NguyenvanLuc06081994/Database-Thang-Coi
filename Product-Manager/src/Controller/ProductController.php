<?php

namespace App\Controller;

use App\Model\Product;
use App\Model\ProductManager;

class ProductController
{
    protected $productController;

    public function __construct()
    {
        $this->productController = new ProductManager();
    }

    public function getAll()
    {
        $products = $this->productController->getAll();
        include('src/View/list.php');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include('src/View/add.php');
        } else {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $product = new Product($name, $price, $quantity);
            $this->productController->add($product);
            header("location:index.php");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $product = $this->productController->getProductId($id);
            include('src/View/update.php');
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $price = $_REQUEST['price'];
            $quantity = $_REQUEST['quantity'];
            $product = new Product($name, $price, $quantity);
            $product->setId($id);
            $this->productController->update($product);
            header("location:index.php");
        }
    }

    public function delete($id)
    {
        $id = $_REQUEST['id'];
        $this->productController->delete($id);
        header('location:index.php');
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $keyword = $_REQUEST['search'];
            $products = $this->productController->search($keyword);
            include ('src/View/list.php');
        }
    }
}