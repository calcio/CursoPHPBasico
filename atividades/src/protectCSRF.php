<?php
function tokenGenerate()
{
    return $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function checkTokenIsValid($token)
{
    if (empty($_SESSION['token']) || $token != $_SESSION['token']) {
        require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../config/constants.php';
        require_once BASE_PATH . 'public/errors/error_404.php';
        exit;
    }
}
