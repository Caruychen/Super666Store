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
	function get_user_orders($user)
    {
        date_default_timezone_set('Europe/Helsinki');
        if ($handle = fopen('./data/orders/orders.csv', 'r'))
        {
            flock($handle, LOCK_EX);
			while (($rawdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				if ($rawdata[1] === $user)
				{
					$userorders[] = array(
						'date' => $rawdata[0],
						'product' => $rawdata[2],
						'quantity' => $rawdata[3] 
					);
				}
				}
       
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }
?>

<h1>Your orders</h1>

<div>I dont know how to display them sorry.</div>