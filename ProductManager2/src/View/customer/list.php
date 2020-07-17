<?php
?>
<a href="index.php?page=add-customer">ADD NEW CUSTOMER</a>
<table>

    <tr>
        <th>STT</th>
        <th>Ten</th>
        <th>SDT</th>
        <th>Email</th>
        <th>Dia Chi</th>
    </tr>
    <?php if (empty($customers)): ?>
        <tr>
            <td>
                No Data
            </td>
        </tr>
    <?php else: ?>
        <?php foreach ($customers as $key => $customer): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $customer->getName() ?></td>
                <td><?php echo $customer->getPhone() ?></td>
                <td><?php echo $customer->getEmail() ?></td>
                <td><?php echo $customer->getAddress() ?></td>
                <td><a  href="index.php?page=update-customer&id=<?php echo $customer->getId() ?>">Update</a></td>
                <td><a onclick="return confirm('Are You Sure?')" href="index.php?page=delete-customer&id=<?php echo $customer->getId() ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

    <tr>
    </tr>
    <?php ?>

</table>

<?php
