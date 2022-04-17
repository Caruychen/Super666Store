<?php

    $dir = "./app/authorization/private/";
    $file_path = $dir."passwd";

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
        return unserialize(file_get_contents($file_path));
    }

    function set_users($users)
    {
        global $file_path;
		file_put_contents($file_path, serialize($users));
        print_r($users);
    }
?>