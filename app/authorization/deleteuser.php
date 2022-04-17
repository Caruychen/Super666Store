<?php
session_start();
include "./app/authorization/user_manager.php";
if ($_POST['submit'] === 'OK')
{
	if (file_exists("./private/passwd"))
	{
		$users = get_users();
		foreach ($users as $key => $user)
		{
			echo $_SESSION['loggued_on_user'];
			if ($user['login'] === $_SESSION['loggued_on_user'])
			{
				unset($users[$key]);
			}
		}
		mk_userdb_file($users);
		header('Location: ./logout.php');
	} 
}
?>