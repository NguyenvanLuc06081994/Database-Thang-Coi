<?php

namespace App\Model;
class UserManager
{
    protected $userData;

    public function __construct()
    {
        $this->userData = new DataConnect();
    }

    public function getAllUsers()
    {
        $data = $this->userData->readFileJson();
        $arr = [];
        foreach ($data as $key => $item) {
            $user = new User($item['id'], $item['img'], $item['name'], $item['age'], $item['address'], $item['gender']);
            array_push($arr, $user);
        }
        return $arr;
    }

    public function addUser($user)
    {
        $data =$this->userData->readFileJson();
        $arr = [
            "id"=> $user->getId(),
            "img"=> $user->getImg(),
            "name"=> $user->getName(),
            "age"=> $user->getAge(),
            "address"=> $user->getAddress(),
            "gender"=> $user->getGender()
        ];
        array_push($data,$arr);
        $this->userData->saveFileJson($data);
    }

    public function updateUser($id)
    {
        $data = $this->getAllUsers();
        $index = $this->getIndexById($id);
    }

    public function getUserByID($id)
    {
        $data = $this->userData->readFileJson();
        foreach ($data as $key => $user){
            if ($user->getId() == $id){
                return new User($user->getId(),$user->getImg(),$user->getName(),$user->getAge(),$user->getAddress(),$user->getGender());
            }
        }
    }

    public function getIndexById($id)
    {
        $data = $this->userData->readFileJson();
        foreach ($data as $key => $user){
            if ($user->getID() == $id ){
                return $key;
            }
        }
    }
}