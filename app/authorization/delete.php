<?php
	if (!isset($_SESSION['loggued_on_user']) ||empty($_SESSION['loggued_on_user']))
		header('Location: index.php?page=login');
?>


<div>
	<h2>Are you sure you want to delete account <?php echo $_SESSION['loggued_on_user']; ?>?</h2>
	<form action='./app/authorization/deleteuser.php' method='POST'>
		<input type="submit" name="submit" value="OK"/>
	</form>
	<a href="?page=account">No</a>
</div>