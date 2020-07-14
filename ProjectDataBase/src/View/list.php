<a href="index.php?page=add-student">ADD Student</a>
<form action="index.php?page=search-student" method="post">
    <input type="text" name="search" required>
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <td>STT</td>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td></td>
    </tr>
    <?php if (empty($students)) : ?>
        <tr>
            <td>No data</td>
        </tr>
    <?php else : ?>
        <?php foreach($students as $key => $student) : ?>

            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getAge() ?></td>
                <td><?php echo $student->getEmail() ?></td>
                <td>
                    <a href="index.php?page=delete-student&id=<?php echo $student->getId()?>">Delete</a>
                    <a href="index.php?page=update-student&id=<?php echo $student->getId()?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>