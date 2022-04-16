<?php
    $basket = $_SESSION['basket'];
?>

<div class="basketList">
    <?php
        foreach ($basket as $key => $value)
        {
            $category = $value['category'];
            $cost = $value['cost'];
            $quantity = $value['quantity'];
            $img = str_replace(' ', '_', $category);
            echo "<div class='basketCard'>
                <img src='./img/categories/$img.png' alt='$key' style='height: 150px;'>
                <div>
                    <h3>$key</h3>
                    <p>Cost: $cost Souls</p>
                    <p>Quantity: $quantity</p>
                </div>
            </div>";
        }
    ?>
</div>