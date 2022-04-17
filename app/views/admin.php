<?PHP
	if ($_SESSION['loggued_on_user'] !== 'admin')
		header('Location: index.php?page=');
?>

</div>
<div class="admin">
    <div class="top">
        <h1 class="maintitle" >Welcome to the Kingdom, Overlord</h1>
    </div>
    <div class="main-container">
		<div class="gray leftnav">
			<h4>Manage store</h4>
			<ul>
				<li><a href="?page=manage">Add or remove products</a></li>
				<li><a href="?page=orders">View orders</a></li>
				<li><a href="?page=deleteusers">Delete user accounts</a></li>
			</ul>
		</div>
		<div class="item-container">
			<h2 class="xlarge">Your orders</h2>
		</div>
    </div>
</div>