<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 50%;

        }

        th, td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>

<form action="index.php?page=search-product" method="post">
    <input type="text" name="search" required>
    <button type="submit">Search</button>
</form>


<a href="index.php?page=add-product">ADD PRODUCT</a>
<table cellspacing="0" style="border: 1px solid black">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th colspan="2">Action</th>

    </tr>
    <?php if (empty($products)): ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else: ?>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getPrice() ?></td>
                <td><?php echo $product->getQuantity() ?></td>
                <td><a href="index.php?page=update-product&id=<?php echo $product->getId() ?>">Update</a></td>
                <td><a href="index.php?page=delete-product&id=<?php echo $product->getId() ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
</body>
</html>
