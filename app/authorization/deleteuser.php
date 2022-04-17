<?php
session_start();
if ($_POST['submit'] === 'OK')
{
	if (file_exists("./private/passwd"))
	{
		$users = unserialize(file_get_contents("./private/passwd"));
		foreach ($users as $key => $user)
		{
			echo $_SESSION['loggued_on_user'];
			if ($user['login'] === $_SESSION['loggued_on_user'])
			{
				unset($users[$key]);
			}
		}
		file_put_contents("./private/passwd", serialize($users));
		header('Location: ./logout.php');
	} 
}
?>