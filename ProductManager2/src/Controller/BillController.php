<?php


namespace App\Controller;


use App\Model\Bill;
use App\Model\BillManager;
use App\Model\CustomerManager;
use App\Model\DetailManager;

class BillController
{
    protected $billController;

    public function __construct()
    {
        $this->billController = new BillManager();
    }

    public function getAll()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $bills = $this->billController->getAll();
            include('src/View/bill/list.php');
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $customer = new CustomerManager();
            $detail = new DetailManager();

            $ids = $customer->getAllId();
            $names = $customer->getAllName();
            include('src/View/bill/add.php');
        } else {
            $date = $_POST['date'];
            $status = $_POST['status'];
            $totalPrice = $_POST['total'];
            $customer_id = $_POST['customer_id'];
            $bill = new Bill($date, $status, $totalPrice, $customer_id);
            $this->billController->add($bill);
            header('location:index.php');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->billController->delete($id);
            header("location:index.php");
        }
    }
}