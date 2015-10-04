<?php
function checkUserLogedIn()
{
    if (empty($_SESSION['id'])) {
        $_SESSION['error'] = 'Você não tem permissão para acessar essa área';

        header('Location: ' . SITE_URL . 'index.php');
    }
}

function checkUserIsAdmin()
{
    if ($_SESSION['tipo'] == 'Administrador') {
        return true;
    } else {
        return false;
    }
}
