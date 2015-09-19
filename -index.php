<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$url = array_filter(explode('/', $url));

var_dump($url);
var_dump($file);
//exit;

$file = $url[0] . '.php';

if ((is_file($file))) {
    require_once($file);
} else {
    require_once('errors/error_404.php');
}
