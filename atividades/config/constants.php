<?php
define('SITE_TITLE', 'Sistema de gerenciador de atividades');
define('SUBTITLE', 'Gerenciador de atividades');
define('VERSION', 'v.: 1.0');
define('DS', DIRECTORY_SEPARATOR);
$dir = explode('/config', dirname(__FILE__));
define('BASE_PATH', $dir[0] . DS);

if ($_SERVER['SERVER_ADDR'] == '127.0.0.1' || $_SERVER['SERVER_ADDR'] = 'localhost') {
    $server = 'localhost';
} else {
    $server = $_SERVER['SERVER_ADDR'];
}
define('SITE_URL', 'http://' . $server . DS . 'CursoPHP/PHPBasico/atividades/public/');

//errors
define('MESSAGE_TYPE_ERRO', 'error');
define('MESSAGE_TYPE_SUCCESS', 'success');
define('MESSAGE_TYPE_WARNING', 'warning');
