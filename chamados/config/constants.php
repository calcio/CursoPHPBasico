<?php
define('SITE_TITLE', 'Sistema de gerenciador de atividades');
define('SUBTITLE', 'Gerenciador de atividades');
define('VERSION', 'v.: 1.0');
define('DS', DIRECTORY_SEPARATOR);
$dir = explode('/config', dirname(__FILE__));
define('BASE_PATH', $dir[0] . DS);
