<?php
	session_start();
	include 'install.php';
	$url = "http://localhost:8080/rush00/index.php";
	if (!isset($_GET['page']) || $_GET['page'] == "home")
		$page = "./app/views/home.php";
	if ($_GET['page'] == "login")
		$page = "./app/authorization/login.php";
	if ($_GET['page'] == "create")
		$page = "./app/authorization/create.php";
	if ($_GET['page'] == "modif")
		$page = "./app/authorization/modif.php";
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
		$_SESSION['total_quantity'] = array_reduce($_SESSION['basket'], "sum_quantity");
	}
	if ($_POST['removefrombasket'] == 'Remove')
	{
		unset($_SESSION['basket'][$_POST['remove_item']]);
		$_SESSION['total_quantity'] = array_reduce($_SESSION['basket'], "sum_quantity");
		$page = "./app/views/basket.php";
	}
	if ($_GET['page'] == "basket")
		$page = "./app/views/basket.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/home.css">
		<link rel="stylesheet" href="./css/cards.css">
		<title>Superpower 666SuperShop</title>
	</head>
	<body>
		<header>
			<nav>
				<ul class="horizontal gray">
					<li><a href="<?php echo $url; ?>">Home</a></li>
					<li><a href="?page=login">Login</a></li>
					<?php if($_SESSION['loggued_on_user']): ?>
						<li> Hello <?php echo $_SESSION['loggued_on_user'];?>!</li>
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
