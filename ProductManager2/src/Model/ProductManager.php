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
            $product = new Product($item['img'], $item['name'], $item['price'], $item['quantity'], $item['vender'], $item['description']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function add($product)
    {
        $sql = "INSERT INTO `products`(`img`, `name`, `price`, `quantity`, `vender`, `description`) VALUES (:img, :name, :price, :quantity, :vender, :description)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':vender', $product->getVender());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->execute();
    }

    public function getProductId($id)
    {
        $sql = "SELECT * FROM products WHERE  id= :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }

    public function update($product)
    {
        $sql = "UPDATE `products` SET `img`= :img,`name`=:name,`price`=:price,`quantity`= :quantity,`vender`= :vender,`description`= :description WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':vender', $product->getVender());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->bindParam(':id', $product->getId());
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
        $sql = "SELECT * FROM `products` WHERE name LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['img'], $item['name'], $item['price'], $item['quantity'], $item['vender'], $item['description']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function getAllIdProduct()
    {
        $sql = "SELECT id FROM products";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getAllNameProduct()
    {
        $sql = "SELECT name FROM products";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}