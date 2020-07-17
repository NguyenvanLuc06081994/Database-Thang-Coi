<form action="" method="post">
   product:  <select name="product_id" id="">
        <?php for ($i=0; $i<count($productIds); $i++)
        {
            ?>
            <option value="<?php echo $productIds[$i]['id'];?>"><?php echo $productNames[$i]['name'];?></option>
            <?php
        } ?>
    </select>
   bill_id: <select name="bill_id" id="">
        <?php for ($i = 0; $i < count($billIds); $i++)
        {
            ?>
            <option value="<?php echo $billIds[$i]['id']?>"><?php echo $billIds[$i]['id']?></option>
        <?php

        } ?>
    </select>
    <input type="text" name="quantity" placeholder="Quantity Product">
    <input type="submit" value="ADD">
</form>
