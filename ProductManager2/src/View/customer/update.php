<form action="" method="post">
    <input type="text" name="id" placeholder="Name" value="<?php echo $customer['id'] ?>" hidden>
    <input type="text" name="name" placeholder="Name" value="<?php echo $customer['name'] ?>">
    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $customer['phone'] ?>">
    <input type="text" name="email" placeholder="Email" value="<?php echo $customer['email'] ?>">
    <input type="text" name="address" placeholder="Address" value="<?php echo $customer['address'] ?>">
    <input type="submit" value="UPDATE">
</form>

