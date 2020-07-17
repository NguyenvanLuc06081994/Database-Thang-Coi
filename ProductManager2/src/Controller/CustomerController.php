<?php


namespace App\Controller;


use App\Model\Customer;
use App\Model\CustomerManager;

class CustomerController
{
    protected $customerController;

    public function __construct()
    {
        $this->customerController = new CustomerManager();
    }

    public function getAll()
    {
        $customers = $this->customerController->getAll();
        include('src/View/customer/list.php');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include("src/View/customer/add.php");
        } else {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $phone, $email, $address);
            $this->customerController->add($customer);
            header("location:index.php");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $customer = $this->customerController->getCustomerId($id);
            include("src/View/customer/update.php");
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $address = $_REQUEST['address'];
            $customer = new Customer($name, $phone, $email, $address);
            $customer->setId($id);
            $this->customerController->update($customer);
            header("location:index.php");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->customerController->delete($id);
            header("location:index.php");
        }
    }

}