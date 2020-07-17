<?php

?>
<a href="index.php?page=add-bill">ADD NEW BILL</a>
<table>

    <tr>
        <th>STT</th>
        <th>Date</th>
        <th>Status</th>
        <th>TotalPrice</th>
        <th>CustomerId</th>
    </tr>
    <?php if (empty($bills)): ?>
        <tr>
            <td>
                No Data
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($bills as $key => $bill): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $bill->getDate() ?></td>
                <td><?php echo $bill->getStatus() ?></td>
                <td><?php echo $bill->getTotalPrice() ?></td>
                <td><?php echo $bill->getCustomerID() ?></td>
                <td><a  href="index.php?page=update-bill&id=<?php echo $bill->getId() ?>">Update</a></td>
                <td><a onclick="return confirm('Are You Sure?')" href="index.php?page=delete-bill&id=<?php echo $bill->getId() ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

    <tr>
    </tr>
    <?php ?>

</table>
