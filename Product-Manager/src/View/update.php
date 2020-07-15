<form action="" method="post">
    <input type="text" name="id" placeholder="Product ID" value="<?php echo $product['id'] ?>" hidden>
    <input type="text" name="name" placeholder="Product Name" value="<?php echo $product['name'] ?>">
    <input type="text" name="price" placeholder="Product Price" value="<?php echo $product['price'] ?>">
    <input type="text" name="quantity" placeholder="Product Quantity" value="<?php echo $product['quantity'] ?>">
    <input type="submit" value="Update">
</form>