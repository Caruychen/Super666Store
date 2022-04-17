<?php
    $basket = $_SESSION['basket'];
    $quantity= $_SESSION['total_quantity'];
?>

<div class="basket">
    <div class="top">
        <h1 class="maintitle">Basket</h1>
    </div>
    <div class="main-container">
        <?php
            if ($quantity > 0):
                include "./app/components/basketForm.php";
            else:
                include "./app/components/basketEmpty.php";
            endif;
        ?>
        
    </div>
</div>