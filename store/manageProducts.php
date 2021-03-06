<?php
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
?>