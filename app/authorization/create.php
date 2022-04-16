<?PHP

	if ($_POST['login'] === "" || $_POST['passwd'] === "" || $_POST['verpasswd'] === "")
		echo "<h3 style='color: red'>Fill all the fields</h3>";
	if ($_POST['passwd'] !== $_POST['verpasswd'])
		echo "<h3 style='color: red'>Passwords does not match</h3>";

	if ($_POST['login'] && $_POST['passwd'] && $_POST['passwd'] === $_POST['verpasswd'])
	{
		if (!file_exists("./app/authorization/private/" || !file_exists("./app/authorization/private/passwd"))) {
			mkdir('./app/authorization/private');
		}
		$exist = false;
		if (file_exists("./app/authorization/private/passwd"))
		{
			$users = unserialize(file_get_contents("./app/authorization/private/passwd"));
			foreach ($users as $key => $user)
			{
				if ($user['login'] === $_POST['login'])
				{
					echo "<h3 style='color: red'>ERROR user exists</h3>";
					$exist = true;
				}
			}
		} else
			$users = [];

		if ($exist === false)
		{
			$entry['login'] = $_POST['login'];
			$entry['passwd'] = hash('sha256', $_POST['passwd']);
			$users[] = $entry;

			file_put_contents("./app/authorization/private/passwd", serialize($users));
			header('Location: index.php?page=login');
			echo "USER HAS BEEN CREATED";
		}
	}
?>

<body style="text-align: center;">
		<h1><a href='index.html'>SUPER666SHOP</a></h1>
		<h2>Create an account</h1>
		<form action="" method="POST">

			Username: <input type="text" name="login" value="" />
			<br />
			<br />
			Password: <input type="password" name="passwd" value="" />
			<br />
			<br />
			Re-type password: <input type="password" name="verpasswd" value="" />
			<br />
			<br />
			<input type="submit" name="submit" value="Create" />
		</form>
	</body>

