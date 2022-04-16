<?PHP
	session_start();
	require "auth.php";
	
	$_SESSION['loggued_on_user'] = "";
	if (!$_POST || !$_POST['login'] || $_POST['login'] === "" || !$_POST['passwd'] || $_POST['passwd'] === "")
		exit("ERROR\n");
	if (auth($_POST['login'], $_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		header('Location: ../../index.php');
	} else {
		exit("ERROR\n");
		header('Location: login.php');
	}

?>
