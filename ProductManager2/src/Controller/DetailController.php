<?php


namespace App\Controller;


use App\Model\BillManager;
use App\Model\Detail;
use App\Model\DetailManager;
use App\Model\ProductManager;

class DetailController
{
    protected $detailController;

    public function __construct()
    {
        $this->detailController = new DetailManager();
    }

    public function getAll()
    {
        if ($_SERVER['REQUEST_METHOD']=='GET'){
            $details = $this->detailController->getAll();
            include ('src/View/detail/list.php');
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD']== 'GET'){
            $products = new ProductManager();
            $productIds = $products->getAllIdProduct();
            $productNames = $products->getAllNameProduct();
            $bills = new BillManager();
            $billIds = $bills->getAllBillId();
            include ('src/View/detail/add.php');
        }else{
            $bill_id = $_POST['bill_id'];
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $detail = new Detail($bill_id,$product_id,$quantity);
            $this->detailController->add($detail);
            header("location:index.php");
        }
    }
}