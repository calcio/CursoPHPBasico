<?php
define('SITE_TITLE', 'Sistema de gerenciador de atividades');
define('SUBTITLE', 'Gerenciador de atividades');
define('VERSION', 'v.: 1.0');
define('DS', DIRECTORY_SEPARATOR);
$dir = explode('/config', dirname(__FILE__));
define('BASE_PATH', $dir[0] . DS);
define('SITE_URL', 'http://' . $_SERVER['SERVER_ADDR'] . DS . 'CursoPHP/PHPBasico/atividades/public/');

//errors
define('MESSAGE_TYPE_ERRO', 'error');
define('MESSAGE_TYPE_SUCCESS', 'success');
define('MESSAGE_TYPE_WARNING', 'warning');
