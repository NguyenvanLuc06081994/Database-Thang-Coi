<?php


namespace App\Model;


class ProductManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['name'], $item['price'], $item['quantity']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function add($product)
    {
        $sql = "INSERT INTO `products`(`name`, `price`, `quantity`) VALUES (:name, :price, :quantity)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->execute();
    }

    public function getProductId($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $student = $stmt->fetch();
        return $student;

    }

    public function update($product)
    {
        $sql = "UPDATE `products` SET name = :name,price = :price, quantity = :quantity WHERE id= :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam('name', $product->getName());
        $stmt->bindParam('price', $product->getPrice());
        $stmt->bindParam('quantity', $product->getQuantity());
        $stmt->bindParam('id', $product->getId());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function search($keyword)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . "%");
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['name'], $item['price'], $item['quantity']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }
}