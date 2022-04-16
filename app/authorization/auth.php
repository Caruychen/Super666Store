<?PHP
	function auth($login, $passwd)
	{
		if (file_exists("./app/authorization/private/passwd"))
		{
			$users = unserialize(file_get_contents("./app/authorization/private/passwd"));
			foreach ($users as $key => $user)
			{
				echo $user['login'];
				if ($user['login'] === $login)
				{
					echo "AAAAAAAAAA";
					if ($user['passwd'] !== hash('sha256', $passwd))
						return false;
					return true;
					}	
				}
			}
		return false;
	}
?>