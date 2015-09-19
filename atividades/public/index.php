<?php
session_start();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config/constants.php';
require_once dirname(__FILE__) . DS . '../src/protectCSRF.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Sistema de controle de chamados">
        <meta name="author" content="seu nome">
        <meta name="keywords" content="controle, chamados">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="icon" type="image/ico" href="<?= SITE_URL; ?>assets/img/php.ico"/>
        <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/normalize.css">
        <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/bootstrap-theme.min.css" media="screen">
        <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?= SITE_URL; ?>assets/css/sticky-footer.css">
        <script src="<?= SITE_URL; ?>assets/js/bootstrap.min.js"></script>
        <title><?= SITE_TITLE; ?></title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-7 col-md-offset-3">
                    <br /><br /><br />
                    <h1 class="text-center login-title">Área restrita</h1>
                    <h2 class="text-center login-title">Logue-se para acessar o sistema</h2>
                    <br /><br />
                    <div class="account-wall">
                        <img class="profile-img" src="assets/img/profile.png" alt="imagem da autenticacao">
                        <form class="form-signin" method="post" action="<?= SITE_URL; ?>autenticacao/login.php">
                            <input type="hidden" name="token" value="<?= geraToken() ?>" />
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required autofocus maxlength="200">
                            </div>

                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input type="password"  name="senha" id="senha" class="form-control" placeholder="Senha" required maxlength="32">
                            </div>
                            <br />
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
                            <br />
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    <?= $_SESSION['error']; ?>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">
                    <?= SUBTITLE; ?> - 2015 - <?= date('Y'); ?>
                    <br /><?= VERSION; ?>
                </p>
            </div>
        </footer>
    </body>
</html>
