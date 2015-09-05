<?php
session_start();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';
require_once dirname(__FILE__) . DS . '../../src/connection.php';

$connection = dbConnect();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="assets/img/php.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sticky-footer.css">
    <title><?= SITE_TITLE; ?></title>
</head>
<body>
    <head>
        <div class="page-header text-center">
            <h1>Gerenciador de adividades <small><?= VERSION; ?></small></h1>
        </div>
    </head>
