<?PHP
	include "./app/authorization/user_manager.php";
	function auth($login, $passwd)
	{
		if (userdb_exists())
		{
			$users = get_users();
			foreach ($users as $key => $user)
			{
				if ($user['login'] === $login)
				{
					if ($user['passwd'] !== hash('sha256', $passwd))
						return false;
					return true;
					}	
				}
			}
		return false;
	}
?>