<form action="" method="post">
    <input type="text" name="date" placeholder="Date">
    <input type="text" name="status" placeholder="Status">
    <input type="text" name="total" placeholder="Total Price" value="">
    <select name="customer_id" id="">
        <?php
        for ($i=0; $i<count($ids); $i++)
        {
            ?>
            <option value="<?php echo $ids[$i]['id'];?>"><?php echo $names[$i]['name'];?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="ADD">
</form>
