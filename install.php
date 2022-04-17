<?php 
	include "./store/user_manager.php";
    include "./store/sessions_manager.php";
    include "./store/dispatcher.php";
    function load_superpowers(&$superpowers)
    {
        $row = 0;
        srand(0);
        if (($handle = fopen('./data/products/superpowers.csv', 'r')) !== FALSE) {
            while (($rawdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $row++;
                if ($row === 1)
                    continue;
                if (!in_array($rawdata[0], $superpowers['categories']))
                    $superpowers['categories'][] = $rawdata[0];
                $superpowers[$rawdata[0]][] = array(
                    'power' => $rawdata[1],
                    'description' => $rawdata[2],
                    'marvel' => $rawdata[3],
                    'dc' => $rawdata[4],
                    'cost' => rand(1, 42)
                );
            }
            fclose($handle);
        }
    }
    function validate_basket()
    {
        date_default_timezone_set('Europe/Helsinki');
        $date = "[".date("D M j G:i:s T Y")."]";
        $user = $_SESSION['loggued_on_user'];
        if ($handle = fopen('./data/orders/orders.csv', 'a'))
        {
            flock($handle, LOCK_EX);
            foreach ($_SESSION['basket'] as $key => $array)
                fputcsv($handle, [$date, $user, $key, $array['quantity']]);
            flock($handle, LOCK_UN);
            fclose($handle);
            clear_basket();
        }
    }
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