<?php
    include 'conn.php';

    $cat_id = $_GET["category_id"];

    $q = "SELECT * 
    from subcategories where cat_id = $cat_id";
    $res = mysqli_query($con, $q);

    while($row = mysqli_fetch_assoc($res)){
        ?>
            <option value="<?=$row["id"]?>"><?=$row["subcat_name"]?></option>
        <?php
    }
?>