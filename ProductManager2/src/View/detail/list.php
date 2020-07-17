<a href="index.php?page=add-detail">ADD NEW DETAIL</a>
<table>

    <tr>
        <th>STT</th>
        <th>BILL_ID</th>
        <th>PRODUCT_ID</th>
        <th>QUANTITY PRODUCT</th>

    </tr>
    <?php if (empty($details)): ?>
        <tr>
            <td>
                No Data
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($details as $key => $detail): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $detail->getBillId() ?></td>
                <td><?php echo $detail->getProductId() ?></td>
                <td><?php echo $detail->getQuantity() ?></td>
                <td><a  href="index.php?page=update-detail&id=<?php echo $detail->getId() ?>">Update</a></td>
                <td><a onclick="return confirm('Are You Sure?')" href="index.php?page=delete-detail&id=<?php echo $detail->getId() ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

    <tr>
    </tr>
    <?php ?>

</table>