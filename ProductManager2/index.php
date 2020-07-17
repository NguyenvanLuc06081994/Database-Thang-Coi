<?php

use App\Controller\BillController;
use App\Controller\CustomerController;
use App\Controller\DetailController;
use App\Controller\ProductController;

require __DIR__ . "/vendor/autoload.php";
$products = new ProductController();
$customers = new CustomerController();
$bills = new BillController();
$details = new DetailController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php include 'src/View/menu/navbar.php' ?>
    <?php switch ($page) {
        case "list-product":
            $products->getAll();
            break;
        case "add-product":
            $products->add();
            break;
        case "update-product":
            $products->update();
            break;
        case "delete-product":
            $products->delete();
            break;
        case "search-product":
            $products->search();
            break;
        case "return-product":
            $products->returnView();
            break;
        case "list-customer":
            $customers->getAll();
            break;
        case "add-customer":
            $customers->add();
            break;
        case "update-customer":
            $customers->update();
            break;
        case "delete-customer":
            $customers->delete();
            break;
        case "list-bill":
            $bills->getAll();
            break;
        case  "add-bill":
            $bills->add();
            break;
        case "delete-bill":
            $bills->delete();
            break;
        case "list-detail":
            $details->getAll();
            break;
        case "add-detail":
            $details->add();
            break;
        default:
            $bills->getAll();
    } ?>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</html>
