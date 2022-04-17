<?PHP
	if ($_SESSION['loggued_on_user'] !== 'admin')
		header('Location: index.php?page=');
	if (isset($_GET['admin']))
	{
		switch ($_GET['admin'])
		{
			case 'products':
				$admin_view = "./app/components/adminProducts.php";
				break;
			case 'orders':
				$admin_view = "./app/components/adminOrders.php";
				break;
			case 'users':
				$admin_view = "./app/components/adminUsers.php";
				break;
		}
	}
	else
		$admin_view = "./app/components/adminProducts.php";
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
				<li><a href="?page=admin&admin=products">Manage products</a></li>
				<li><a href="?page=admin&admin=orders">View orders</a></li>
				<li><a href="?page=admin&admin=users">Manage user accounts</a></li>
			</ul>
		</div>
		<div class="item-container">
			<?php include $admin_view ?>
		</div>
    </div>
</div>