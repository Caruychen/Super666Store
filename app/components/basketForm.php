<?php
    $is_loggedin = ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] !== "");
    $cost = $_SESSION['total_cost'];
?>
<div class="gray leftnav">
    <?php if(!$is_loggedin): ?>
        <form id='loginbutton' action='index.php' method='GET'>
            <button form='loginbutton' type='submit' name='page' value='login'>Login</button>
        </form>
    <?php endif; ?>
    <form id='test' action='index.php' method='POST'>
        <button form='test' name='validate' value='Validate' <?php if (!$is_loggedin) { ?> disabled <?php } ?>>Validate</button>
    </form>
    <div>
        <h3>Total Cost:</h3>
        <h3><?php echo $cost; ?>Souls</h3>
    </div>
</div>
<?php include "./app/components/basketCards.php"?>