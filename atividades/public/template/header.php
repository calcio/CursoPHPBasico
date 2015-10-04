<?php
function showHeader(array $css=[])
{
    session_start();

    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';
    require_once BASE_PATH . 'src/sessionVerify.php';

    checkUserLogedIn();

    require_once BASE_PATH . 'src/connection.php';
    require_once BASE_PATH . 'src/showMessage.php';
    require_once BASE_PATH . 'src/prepareCrud.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="<?= SITE_URL; ?>assets/img/php.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/sticky-footer.css">
    <?php
    if ($css) :
        foreach ($css as $script) :
            $src = SITE_URL . 'assets/css/' . $script . '.css';
            if (file_exists(BASE_PATH . 'public/assets/css/' . $script . '.css')) :
    ?>
            <link rel="stylesheet" href="<?= $src ?>">
    <?php
            endif;
        endforeach;
    endif;
    ?>

    <script src="<?= SITE_URL; ?>assets/js/jquery-2.1.4.min.js"></script>
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
                    <a class="navbar-brand" href="<?= SITE_URL; ?>dashboard.php">
                        <img src="<?= SITE_URL; ?>assets/img/php.ico" width="30px">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a hreh="<?= SITE_URL; ?>dasboard.php"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a></li>
                        <li><a href="<?= SITE_URL; ?>atividades/index.php"><span class="glyphicon glyphicon-tasks"></span> Listar atividades</a></li>
                        <li><a href="<?= SITE_URL; ?>atividades/form.php"><span class="glyphicon glyphicon-pencil"></span> Criar nova atividade</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-cog"></span> Administração <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?= SITE_URL; ?>usuarios/form.php?id=<?= $_SESSION['id']; ?>">
                                    <span class="glyphicon glyphicon-user"></span> <?= $_SESSION['nome']; ?></a>
                                </li>
                                <li role="separator" class="divider"></li>

                                <?php if (checkUserIsAdmin()) : ?>
                                <li><a href="<?= SITE_URL; ?>usuarios/index.php"><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
                                <li><a href="<?= SITE_URL; ?>setores/index.php"><span class="glyphicon glyphicon-map-marker"></span> Setores</a></li>
                                <li><a href="<?= SITE_URL; ?>status-atividade/index.php"><span class="glyphicon glyphicon-check"></span> Status atividade</a></li>
                                <li role="separator" class="divider"></li>
                                <?php endif; ?>
                                <li><a href="<?= SITE_URL; ?>autenticacao/logout.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
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
    <main>
<?php } ?>
