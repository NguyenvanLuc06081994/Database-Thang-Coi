<form action="" method="post"  enctype="multipart/form-data">
    <input type="text" name="id" value="<?php echo $product['id'] ?>" hidden>
    <input type="file" name="my-file">
    <input type="text" name="name" placeholder="Name" value="<?php echo $product['name'] ?>">
    <input type="text" name="price" placeholder="Price" value="<?php echo $product['price'] ?>">
    <input type="text" name="quantity" placeholder="Quantity" value="<?php echo $product['quantity'] ?>">
    <input type="text" name="vender" placeholder="Vender" value="<?php echo $product['vender'] ?>">
    <input type="text" name="description" placeholder="Description" value="<?php echo $product['description'] ?>">
    <input type="submit" value="Update">
</form>
