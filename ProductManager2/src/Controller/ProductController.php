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
            $file = $_FILES['my-file']['tmp_name'];
            $path = "uploads/" . $_FILES['my-file']['name'];
            if (move_uploaded_file($file, $path)) {
                echo "Tải tập tin thành công";
            } else {
                echo "Tải tập tin thất bại";
            }

            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $vender = $_POST['vender'];
            $description = $_POST['description'];
            $proudct = new Product($path, $name, $price, $quantity, $vender, $description);
            $this->productController->add($proudct);
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
            $path = "uploads/" . $_FILES['my-file']['name'];
            if (unlink($Path)) {
                echo "success";
            } else {
                echo "fail";
            }
            $file = $_FILES['my-file']['tmp_name'];
            if (move_uploaded_file($file, $path)) {
                echo "Tải tập tin thành công";
            } else {
                echo "Tải tập tin thất bại";
            }
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $price = $_REQUEST['price'];
            $quantity = $_REQUEST['quantity'];
            $vender = $_REQUEST['vender'];
            $description = $_REQUEST['description'];
            $product = new Product($path, $name, $price, $quantity, $vender, $description);
            $product->setId($id);
            $this->productController->update($product);
            header("location:index.php");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id = $_REQUEST['id'];
            $this->productController->delete($id);
            header("location:index.php");
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $keyword = $_REQUEST['keyword'];
            $products = $this->productController->search($keyword);
            include_once('src/View/list.php');
        }
    }

    public function returnView()
    {
        $this->getAll();
    }
}