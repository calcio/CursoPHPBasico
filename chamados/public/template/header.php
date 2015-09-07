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
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/sticky-footer.css">
    <title><?= SITE_TITLE; ?></title>
</head>

<body>
    <head>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/php.ico" width="30px">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a hreh="#"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Listar atividades</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Criar nova atividade</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" method="post" action="#">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="buscar" name="buscar">
                            <span class="input-group-addon glyphicon glyphicon-search"></span>
                        </div>
                    </div>
                    </form>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Administração <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Usuários</a></li>
                                <li><a href="#">Setores</a></li>
                                <li><a href="#">Status</a></li>
                                <li role="separator" class="divider">Setores</li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav><br />
        <div class="page-header text-center">
            <h1>Gerenciador de adividades <small><?= VERSION; ?></small></h1>
        </div>
    </head>
