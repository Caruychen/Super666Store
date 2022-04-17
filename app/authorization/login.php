<?php
	require "auth.php";

	if (isset($_POST['submit'])) {
		if ($_POST['submit'] == "Sign In") {
			if (auth($_POST['login'], $_POST['passwd']))
			{
				$_SESSION['loggued_on_user'] = $_POST['login'];
				header('Location: index.php');
			}
			else
				echo "<h3 style='color: red'>Login or password incorrect</h3>";
			}
		}
?>

	<body style="text-align: center;">

		<h1 class="maintitle">SUPER666SHOP</h1>
		<h2>Login to the shop</h2>
		<form action="" method="POST">

			Username: <input type="text" name="login" value="" />
			<br />
			<br />
			
			Password: <input type="password" name="passwd" value="" />
			
			<br />
			<br />
			<input type="submit" name="submit" value="Sign In" />
			<br />
		</form>
		<br />
		<a href="?page=create">Create account</a>
		<a href="?page=forgot">Forgot password?</a>
	</body>
