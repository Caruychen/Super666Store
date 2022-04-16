<?php
	session_start();
	include 'store.php';
	if (!isset($_GET['page']) || $_GET['page'] == "home")
		$page = "./app/views/home.html";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/home.css">
		<title>Super666Shop</title>
	</head>
	<body>
		<header>
			<nav>
				<ul class="horizontal gray">
					<li><a href="#home">Home</a></li>
					<li><a href="#login">Login</a></li>
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