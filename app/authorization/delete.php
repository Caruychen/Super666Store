<?php
	if (!isset($_SESSION['loggued_on_user']) ||empty($_SESSION['loggued_on_user']))
		header('Location: index.php?page=login');
?>


<div class="question">
	<h2>Are you sure you want to delete account <?php echo $_SESSION['loggued_on_user']; ?>?</h2>
	<ul class="ynbuttons">
	<li class="but">
		<form action='./index.php' method='POST'>
			<input type="submit" name="deleteuser" value="OK"/>
		</form>
	</li>
	<li class="but"><button><a href="?page=account">No</a></button></li>
	</ul>
</div>