<?php
define('HOST', $_SERVER['SERVER_ADDR']);

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1'
    || $_SERVER['SERVER_ADDR'] == 'localhost'
) {
    //local database
    define('USER', 'root');
    define('PASSWORD', 'BdLnx#1404');
    define('DATABASE_NAME', 'atividades');
} else {
    //remote database
    define('USER', 'remote_user');
    define('PASSWORD', 'remote_password');
    define('DATABASE_NAME', 'remote_database_name');
}
