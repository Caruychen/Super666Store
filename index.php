<?php
	session_start();
	include 'install.php';
	include "./app/authorization/user_manager.php";
	$url = "http://localhost:8080/rush00/index.php";
	if (!isset($_GET['page']) || $_GET['page'] == "home")
		$page = "./app/views/home.php";
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
	if ($_POST['addtobasket'] == 'Add To Basket')
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
	if ($_POST['removefrombasket'] == 'Remove')
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
		if (file_exists("./private/passwd"))
		{
			$users = get_users();
			foreach ($users as $key => $user)
			{
				echo $_SESSION['loggued_on_user'];
				if ($user['login'] === $_SESSION['loggued_on_user'])
				{
					unset($users[$key]);
				}
			}
			mk_userdb_file($users);
			header('Location: ./logout.php');
		} 
	}
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- FONTS -->  
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Palanquin:wght@100;400;700&family=Roboto:wght@100;700&display=swap" rel="stylesheet">
	<!-- CSS  --> 		
<link rel="stylesheet" href="./css/home.css">
		<link rel="stylesheet" href="./css/cards.css">
		<title>Superpower 666SuperShop</title>
	</head>
	<body>
		<header>
			<nav>
				<ul class="horizontal gray">
					<li><a href="<?php echo $url; ?>">Home</a></li>
					<?php if(!$_SESSION['loggued_on_user'] || $_SESSION['loggued_on_user'] === ""): ?>
					<li><a href="?page=login">Login</a></li>
					<?php endif; ?>
					<?php if($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] !== ""): ?>
					<li class="Center"><a style="pointer-events: none; text-weight: bold;">Hello <?php echo $_SESSION['loggued_on_user'];?>!</a></li>
					<li class="rightli" style="float:right"><a href="?page=account">Manage account</a></li>
					<li class="rightli" style="float:right"><a href="./app/authorization/logout.php" style="width: 100%">Logout</a></li>
					<?php endif; ?>
					<li class="rightli" style="float:right">
						<?php 
							$quantity = $_SESSION['total_quantity'];
							if ($quantity > 0)
								echo "<p class='basketcount'>$quantity</p>";
						?>
						<a href="<?php echo $url.'?page=basket'?>">Basket</a>
					</li>
				</ul>
			</nav>
		</header>	
		<div class="view">
			<?php include $page; ?>
		</div>
		<footer>
			<hr />
			<p>&copy parkharo & cchen 2022</p>
		</footer>
	</body>
</html>
