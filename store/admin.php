<?PHP
	if ($_SESSION['loggued_on_user'] !== 'admin')
		header('Location: index.php?page=');
?>

<div class="gray leftnav">
		<h4>Manage store</h4>

		<ul>
			<li><a href="?page=manage">Add or remove products</a></li>
			<li><a href="?page=orders">View orders</a></li>
			<li><a href="?page=deleteusers">Delete user accounts</a></li>
		</ul>

	</div>
