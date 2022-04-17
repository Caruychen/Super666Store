<?php
    $is_loggedin = ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] !== "");
?>
<div>
    <h3>Looks like your basket is empty!</h3>
    <form id="returnhome" action='index.php' method='GET'>
        <button form="returnhome" type="submit" value="home">Sacrifice some Souls</button>
    </form>
    <?php if (!$is_loggedin): ?>
        <form id="loginbutton" action='index.php' method='GET'>
            <button form="loginbutton" type="submit" name="page" value="login">Login</button>
        </form>
    <?php endif; ?>
</div>