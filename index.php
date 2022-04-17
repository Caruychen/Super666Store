<?php
	session_start();
	include 'install.php';
	include "./app/authorization/user_manager.php";
	$url = "http://localhost:8080/rush00/index.php";
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
					<?php if(!is_loggedin()): ?>
						<li><a href="?page=login">Login</a></li>
					<?php endif; ?>
					<?php if(is_loggedin()): ?>
						<li class="Center"><a style="pointer-events: none; text-weight: bold;">Hello <?php echo $_SESSION['loggued_on_user'];?>!</a></li>
						<li class="rightli" style="float:right"><a href="?page=account">Manage account</a></li>
						<li class="rightli" style="float:right"><a href="?logout=true" style="width: 100%">Logout</a></li>
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
