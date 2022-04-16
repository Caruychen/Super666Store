<?php
	session_start();
	include 'store.php';
	if (!isset($_GET['page']) || $_GET['page'] == "home")
		$page = "./app/views/home.php";
	if ($_GET['page'] == "login")
		$page = "./app/authorization/login.php";
	if ($_GET['page'] == "create")
		$page = "./app/authorization/create.php";
	if ($_GET['page'] == "modif")
		$page = "./app/authorization/modif.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/home.css">
		<link rel="stylesheet" href="./css/cards.css">
		<title>Super666Shop</title>
	</head>
	<body>
		<header>
			<nav>
				<ul class="horizontal gray">
					<li><a href="index.php">Home</a></li>
					<li><a href="?page=login">Login</a></li>
					<?php if($_SESSION['loggued_on_user']): ?>
						<li> Hello <?php $_SESSION['loggued_on_user'];?>!</li>
						<?php endif; ?>
					<li class="rightli" style="float:right"><a href="#basket">Basket</a></li>
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