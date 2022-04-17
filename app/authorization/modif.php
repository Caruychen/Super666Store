<?PHP
	if (($_POST['login'] === "" || $_POST['oldpw'] === ""|| $_POST['newpw'] === "")  &&  $_POST['submit'] === "OK")
		echo "<h3 style='color: red'>Please fill all the fields</h3>";
	if ($_POST['submit'] === "OK")
	{
		if ($_POST['login'] && $_POST['newpw'] && $_POST['oldpw'])
		{
			if (userdb_exists())
			{
				$update = false;
				$users = get_users();
				foreach ($users as $key => $user)
				{
					if ($user['login'] === $_POST['login'])
					{
						if ($user['passwd'] !== hash('sha256', $_POST['oldpw']))
							echo "<h3 style='color: red'>Old password incorrect</h3>";
						else {
						$users[$key]['passwd'] = hash('sha256', $_POST['newpw']);
						$update = true;
						}
					}	
				}
			}

			if ($update == true)
			{
				set_users($users);
				header('Location: index.php?page=account');
				echo "OK\n";
			} else 
				echo "ERROR\n";
		} else
			echo "ERROR\n";
	}
?>

<h2>Change password</h2>
		<form action="" method="POST">

			Username: <input type="text" name="login" value="" />
			<br />
			<br />
			Old password: <input type="password" name="oldpw" value="" />
			<br />
			<br />
			New password: <input type="password" name="newpw" value="" />
			<br />
			<br />
			<input type="submit" name="submit" value="OK" />
		</form>