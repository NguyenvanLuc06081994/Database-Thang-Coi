<form action="" method="post">
        <input type="text" name="id" placeholder="Student ID"  value="<?php echo $student['student_id'] ?>" hidden>
    <input type="text" name="name" placeholder="Student Name"  value="<?php echo $student['student_name'] ?>">
    <input type="text" name="age" placeholder="Student Age"  value="<?php echo $student['student_age'] ?>">
    <input type="text" name="email" placeholder="Student Email"  value="<?php echo $student['student_email'] ?>">
    <input type="submit" value="ADD">
    <a href="index.php" >Cancle</a>
</form>