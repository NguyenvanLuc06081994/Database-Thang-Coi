<?php

namespace App\Model;
class DataConnect
{
    protected $fileName;

    public function __construct()
    {
        $this->fileName = "src/Model/data.json";
    }

    public function readFileJson()
    {
        $dataJson = file_get_contents($this->fileName);
        return json_decode($dataJson, true);
    }

    public function saveFileJson($arr)
    {
        $dataJson = json_encode($arr);
        file_put_contents($this->fileName, $dataJson);
    }

    public function resetFileJson()
    {
        file_put_contents($this->fileName,json_encode([]));
    }
}