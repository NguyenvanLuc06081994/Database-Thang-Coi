<?php

use App\Controller\StudentController;

require __DIR__ . '/vendor/autoload.php';
$controller = new StudentController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
switch ($page) {
    case "list" :
        $controller->getAllStudent();
        break;
    case "add-student":
        $controller->addStudent();
        break;
    case "update-student":
        $controller->updateStudent();
        break;
    case "delete-student":
        $id = $_REQUEST['id'];
        $controller->deleteStudent($id);
        break;
    case "search-student":
        $controller->searchStudent();
        break;
    default :
        $controller->getAllStudent();
}
?>
</body>
</html>
