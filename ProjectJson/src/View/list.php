
<a href="index.php?page=add-user">ADD USER</a>
<table>
    <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Age</th>
        <th>Address</th>
        <th>Gender</th>
    </tr>
    <?php if (empty($listUsers)): ?>
    <tr>
        <td>No Data</td>
    </tr>
    <?php else: ?>
    <?php foreach ($listUsers as $key => $user): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $user->getId() ?></td>
        <td><img src="<?php echo $user->getImg() ?>" alt="" style="width: 75px; height: 75px"></td>
        <td><?php echo $user->getName() ?></td>
        <td><?php echo $user->getAge() ?></td>
        <td><?php echo $user->getAddress() ?></td>
        <td><?php echo $user->getGender() ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

