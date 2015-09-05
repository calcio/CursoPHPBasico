<?php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1'
    || $_SERVER['REMOTE_ADDR'] == 'localhost'
) {
    //local database
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'BdLnx#1404');
    define('DATABASE_NAME', 'chamados');
} else {
    //remote database
    define('HOST', $_SERVER['REMOTE_ADDR']);
    define('USER', 'remote_user');
    define('PASSWORD', 'remote_password');
    define('DATABASE_NAME', 'remote_database_name');
}
