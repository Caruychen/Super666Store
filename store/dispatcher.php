<?php
	if (!isset($_GET['page']) || $_GET['page'] == "home")
		$page = "./app/views/home.php";
	else 
	{
		if ($_GET['page'] == "login")
			$page = "./app/authorization/login.php";
		if ($_GET['page'] == "create")
			$page = "./app/authorization/create.php";
		if ($_GET['page'] == "modif")
			$page = "./app/authorization/modif.php";
		if ($_GET['page'] == "account")
			$page = "./app/views/account.php";
		if ($_GET['page'] == 'delete')
			$page = "./app/authorization/delete.php";
		if ($_GET['page'] == "basket")
			$page = "./app/views/basket.php";
		if ($_GET['page'] == 'admin')
			$page = "./store/admin.php";
	}
	if (isset($_GET['logout']) && $_GET['logout'] == 'true')
	{
		logout();
		$page = "./app/views/home.php";
	}
?>

<?php
	if (isset($_POST['addtobasket']) && $_POST['addtobasket'] == 'Add To Basket')
	{
		$item = unserialize($_POST['superpower_item']);
		if (!array_key_exists('basket', $_SESSION))
			$_SESSION['basket'] = array();
		if (!array_key_exists($item['power'], $_SESSION['basket']))
		{
			$_SESSION['basket'][$item['power']] = array(
				'cost' => $item['cost'],
				'category' => $item['category'],
				'quantity' => 1
			);
		}
		else
			$_SESSION['basket'][$item['power']]['quantity'] += 1;
		compute_summary();
	}
	if (isset($_POST['removefrombasket']) && $_POST['removefrombasket'] == 'Remove')
	{
		unset($_SESSION['basket'][$_POST['remove_item']]);
		compute_summary();
		$page = "./app/views/basket.php";
	}
	if (isset($_POST['validate']) && $_POST['validate'] == "Validate"
		&& !empty($_SESSION['basket'])
		&& $_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] !== "")
	{
		validate_basket();
	}
	if (isset($_POST['deleteuser']) && $_POST['deleteuser'] == "OK")
	{
		if (userdb_exists())
		{
			$users = get_users();
			foreach ($users as $key => $user)
			{
				if ($user['login'] === $_SESSION['loggued_on_user'])
					unset($users[$key]);
			}
			set_users($users);
			logout();
		} 
	}
?>