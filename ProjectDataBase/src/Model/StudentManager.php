<?php


namespace App\Model;


class StudentManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllStudent()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item) {
            $student = new Student($item['student_name'], $item['student_age'], $item['student_email']);
            $student->setId($item['student_id']);
            array_push($arr, $student);
        }
        return $arr;
    }

    public function addStudent($student)
    {
        $sql = "INSERT INTO `students`(`student_name`, `student_age`, `student_email`) VALUES (:student_name, :student_age, :student_email)";
        $stmt = $this->database->prepare($sql);
//        $stmt->bindParam(':student_id', $student->getId());
        $stmt->bindParam(':student_name', $student->getName());
        $stmt->bindParam(':student_age', $student->getAge());
        $stmt->bindParam(':student_email', $student->getEmail());
        $stmt->execute();
    }

    public function getStudentId($id)
    {
        $sql = "SELECT * FROM students WHERE student_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $student = $stmt->fetch();
        return $student;
    }


    public function updateStudent($student)
    {
        $sql = "UPDATE students SET student_name= :name , student_age= :age, student_email = :email WHERE student_id = :id ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $student->getName());
        $stmt->bindParam(':age', $student->getAge());
        $stmt->bindParam(':email', $student->getEmail());
        $stmt->bindParam(':id', $student->getId());
        $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $sql = "DELETE FROM students WHERE student_id = :id ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function searchStudent($keyword)
    {
        $sql = "SELECT * FROM students WHERE student_name LIKE :keyword ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item) {
            $student = new Student($item['student_name'], $item['student_age'], $item['student_email']);
            $student->setId($item['student_id']);
            array_push($arr, $student);
        }
        return $arr;
    }
}