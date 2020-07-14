<?php

namespace App\Controller;

use App\Model;

class UserController
{
    protected $userManager;

    public function __construct()
    {
        $this->userManager = new Model\UserManager();
    }

    public function viewUser()
    {
        $listUsers = $this->userManager->getAllUsers();
        include_once('src/View/list.php');
    }

    public function addUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include_once('src/View/add.php');
        } else {
            $id = $_POST['id'];
            $img = $_POST['img'];
            $name = $_POST['name'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $user = new Model\User($id, $img, $name, $age, $address, $gender);
            $this->userManager->addUser($user);
            header("location:index.php");
        }
    }
}