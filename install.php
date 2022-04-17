<?php 
    include "./store/manageOrders.php";
	include "./store/manageUsers.php";
    include "./store/manageSessions.php";
    include "./store/manageProducts.php";
    include "./store/dispatcher.php";
?>

<?php
    $superpowers = array(
        'categories' => array()
    );
    load_superpowers($superpowers);
    function sum_quantity($carry, $item)
    {
        $carry += $item['quantity'];
        return $carry;
    }
    function sum_cost($carry, $item)
    {
        $carry += $item['quantity'] * $item['cost'];
        return $carry;
    }
?>