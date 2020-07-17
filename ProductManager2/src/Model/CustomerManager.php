<?php


namespace App\Model;


class CustomerManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $customer = new Customer($item['name'], $item['phone'], $item['email'], $item['address']);
            $customer->setId($item['id']);
            array_push($arr, $customer);
        }
        return $arr;
    }

    public function add($customer)
    {
        $sql = "INSERT INTO `customers`(`name`, `phone`, `email`, `address`) VALUES (:name, :phone, :email, :address)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $customer->getName());
        $stmt->bindParam(':phone', $customer->getPhone());
        $stmt->bindParam(':email', $customer->getEmail());
        $stmt->bindParam(':address', $customer->getAddress());
        $stmt->execute();
    }

    public function getCustomerId($id)
    {
        $sql = "SELECT * FROM customers WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update($customer)
    {
        $sql = "UPDATE `customers` SET `name`= :name,`phone`= :phone,`email`= :email,`address`= :address WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $customer->getId());
        $stmt->bindParam(':name', $customer->getName());
        $stmt->bindParam(':email', $customer->getEmail());
        $stmt->bindParam(':phone', $customer->getPhone());
        $stmt->bindParam(':address', $customer->getAddress());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `customers` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getAllId()
    {
        $sql = 'SELECT id FROM customers';
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllName()
    {
        $sql = 'SELECT name FROM customers';
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}