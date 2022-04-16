<?php
//    $rawpower = fgetcsv('./data/products/superpowers.csv');
    $rawpower = array();
    if (($handle = fopen('./data/products/superpowers.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
//            echo "<p>$num fields</p>";
        }
        fclose($handle);
    }
?>