<?php
    $basket = $_SESSION['basket'];
?>

<div class="basket">
    <div class="top">
        <h1 class="maintitle">Basket</h1>
    </div>
    <div class="main-container">
        <div class="gray leftnav">
           <button><h2>Validate</h2></button>
           <div>
               <h3>Total Cost:</h3>
               <h3>Souls</h3>
           </div>
        </div>
        <?php include "./app/components/basketCards.php"?>
    </div>
</div>