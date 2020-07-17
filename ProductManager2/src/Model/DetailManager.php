<?php


namespace App\Model;


class DetailManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM details";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $detail = new Detail($item['bill_id'], $item['product_id'], $item['quantity']);
            $detail->setId($item['id']);
            array_push($arr, $detail);
        }
        return $arr;
    }

    public function add($detail)
    {
        $sql = 'INSERT INTO `details`( `bill_id`, `product_id`, `quantity`) VALUES (:bill_id, :product_id, :quantity)';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':bill_id', $detail->getBillId());
        $stmt->bindParam(':product_id', $detail->getProductId());
        $stmt->bindParam(':quantity', $detail->getQuantity());
        $stmt->execute();
    }


}