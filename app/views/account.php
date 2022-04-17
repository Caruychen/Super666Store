<?php
	if (!isset($_SESSION['loggued_on_user']) ||empty($_SESSION['loggued_on_user']))
		header('Location: index.php?page=login');
	$login = $_SESSION['loggued_on_user'];
	$basket = $_SESSION['basket'];
?>
<div class="account">
    <div class="top">
        <h1 class="maintitle" >Account</h1>
    </div>
    <div class="main-container">
		<div class="gray leftnav">
			<h4>Manage your account</h4>
			<ul>
				<li><a href="?page=delete">Delete account</a></li>
				<li><a href="?page=modif">Change password</a></li>
			</ul>
		</div>
		<div class="item-container">
			<h2 class="xlarge">Your orders</h2>
			<div class="order-list">
				<div class='order-item'>
				<p>Order</p>
				<p>Quantity</p>
				</div>
				<?php 
					$orderlist = get_user_orders($_SESSION['loggued_on_user']);
					foreach ($orderlist as $order)
					{
						$product = $order['product'];
						$quantity = $order['quantity'];
						echo "<div class='order-item'>

							<p class='item-align-left'><b>$product</b></p>

							<p class='item-align-right'><b>$quantity</b></p>
						
						</div>";
					}
				?>
			</div>
		</div>
    </div>
</div>