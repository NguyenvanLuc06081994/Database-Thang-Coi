<?php


namespace App\Model;


class BillManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM bills";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $bill = new Bill($item['date'], $item['status'], $item['totalPrice'], $item['customer_id']);
            $bill->setId($item['id']);
            array_push($arr, $bill);
        }
        return $arr;
    }

    public function add($bill)
    {
        $sql = "INSERT INTO `bills`( `date`, `status`, `totalPrice`, `customer_id`) VALUES (:date, :status , :totalPrice, :customer_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':date', $bill->getDate());
        $stmt->bindParam(':status', $bill->getStatus());
        $stmt->bindParam(':totalPrice', $bill->getTotalPrice());
        $stmt->bindParam(':customer_id', $bill->getCustomerId());
        $stmt->execute();
    }

    public function getAllBillId()
    {
        $sql = "SELECT id FROM bills";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBillId($id)
    {
        $sql = "SELECT * FROM `bills` WHERE id =:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `bills` WHERE id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

}