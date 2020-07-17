<div class="pt-3">
    <table border="1" class="table table-hover">
        <thead class="badge-dark">
        <tr>
            <th>STT</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Vender</th>
            <th>Description</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <?php if (empty($products)): ?>
            <tr>
                <td>No data</td>
            </tr>
        <?php else: ?>
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><img src="<?php echo $product->getImg() ?>" alt="" width="100px" height="100px"></td>
                    <td><?php echo $product->getName() ?></td>
                    <td><?php echo $product->getPrice() ?></td>
                    <td><?php echo $product->getQuantity() ?></td>
                    <td><?php echo $product->getVender() ?></td>
                    <td><?php echo $product->getDescription() ?></td>
                    <td><a href="index.php?page=update-product&id=<?php echo $product->getId() ?>"
                           class="btn btn-primary">Update</a></td>
                    <td><a onclick="return confirm('Are You Sure?')" href="index.php?page=delete-product&id=<?php echo $product->getId() ?>"
                           class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>