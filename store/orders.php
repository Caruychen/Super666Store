<?PHP
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