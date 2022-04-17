<?php
    $nav = "./app/components/nav.php";
    if (!isset($_GET['category']))
        $items = "./app/components/categories.php";
    else
        $items = "./app/components/items.php";
?>
<div class="home">
    <div class="top">
        <h1 class="maintitle"> * s u p e r * ✞ 6 ✞ 6 ✞ 6 ✞ * s h o p * </h1>
    </div>
    <div class="main-container">
        <?php include $nav; ?>
        <?php include $items; ?>
    </div>
</div>