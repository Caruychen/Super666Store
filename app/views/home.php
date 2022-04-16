<?php
    $nav = "./app/components/nav.php";
    if (!isset($_GET['category']))
        $items = "./app/components/categories.php";
	if (!isset($_SESSION['itemview']))
		$_SESSION['itemview'] = 'categories';
?>
<div class="home">
    <div class="top">
        <h1 class="maintitle" >Superpower SuperShop</h1>
    </div>
    <div class="main-container">
        <?php include $nav; ?>
        <?php include $items; ?>
    </div>
</div>