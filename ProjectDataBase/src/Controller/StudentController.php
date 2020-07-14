<?php

namespace App\Controller;

use App\Model\Student;
use App\Model\StudentManager;

class StudentController
{
    protected $studentController;

    public function __construct()
    {
        $this->studentController = new StudentManager();
    }

    public function getAllStudent()
    {
        $students = $this->studentController->getAllStudent();
        include("src/View/list.php");
    }

    public function addStudent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include('src/View/add.php');
        } else {
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $email = $_REQUEST['email'];
            $student = new Student($name, $age, $email);
            $this->studentController->addStudent($student);
            header("location:index.php");
        }
    }

    public function updateStudent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_REQUEST['id'];
            $student = $this->studentController->getStudentId($id);
            include('src/View/update.php');
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $email = $_REQUEST['email'];
            $student = new Student($name, $age, $email);
            $student->setId($id);
            $this->studentController->updateStudent($student);
            header("location:index.php");
        }
    }

    public function deleteStudent($id)
    {
        $id = $_REQUEST['id'];
        $this->studentController->deleteStudent($id);
        header("location:index.php");
    }

    public function searchStudent()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = $_REQUEST['search'];
            $students = $this->studentController->searchStudent($search);
            include("src/View/list.php");
        }
    }
}