<?php
    $dir = "./app/authorization/private/";
    $file_path = $dir."passwd.csv";
    function _get_userlogin($user)
    {
        return $user['login'];
    }
    function userdb_exists()
    {
        global $file_path;
		return file_exists($file_path);

    }
    function mk_userdb_if_not_exist()
    {
        global $dir, $file_path;
		if (!file_exists($dir || !file_exists($file_path))) {
			mkdir($dir);
		}
    }
    function get_users()
    {
        global $file_path;
        $users = array();
        if (($handle = fopen($file_path, 'r')) !== FALSE) {
            flock($handle, LOCK_EX);
            while (($rawdata = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $users[] = array(
                    'login' => $rawdata[0],
                    'passwd' => $rawdata[1]
                );
            }
            flock($handle, LOCK_UN);
            fclose($handle);
        }
        return $users;
    }
    function set_users($users)
    {
        global $file_path;
       if ($handle = fopen($file_path, 'w'))
        {
            flock($handle, LOCK_EX);
            foreach ($users as $entry)
                fputcsv($handle, [$entry['login'], $entry['passwd']]);
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }
    function del_user($login)
    {
        $users = get_users();
        $logins = array_map('_get_userlogin', $users);
        $drop_key = array_search($login, $logins);
        unset($users[$drop_key]);
        set_users($users);
    }
?>