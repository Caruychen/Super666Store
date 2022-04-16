<?php
    $basket = $_SESSION['basket'];
?>

<div class="basket">
    <div class="top">
        <h1 class="maintitle">Basket</h1>
    </div>
    <div class="main-container">
        <div class="gray leftnav">
            <h2>Validate</h2>
        </div>
        <?php include "./app/components/basketCards.php"?>
    </div>
</div>