<?php
	if (!isset($_SESSION['loggued_on_user']) ||empty($_SESSION['loggued_on_user']))
		header('Location: index.php?page=login');
	$login = $_SESSION['loggued_on_user'];
	$basket = $_SESSION['basket'];
	?>

	<div>
		<h2>Manage your account</h2>

		<ul>
			<li><a href="?page=delete">Delete account</a></li>
			<li><a href="?page=modif">Change password</a></li>
		</ul>

	</div>