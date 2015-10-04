<?php
session_start();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';
require_once dirname(__FILE__) . DS . '../../src/connection.php';
require_once dirname(__FILE__) . DS . '../../src/protectCSRF.php';

if ($_POST) {
    extract($_POST);

    $token = isset($token) ? $token : null;
    $email = isset($email) ? $email : null;
    $senha = isset($senha) ? $senha : null;

    checkTokenIsValid($token);

    $email = antiInjection($email);
    $senha = antiInjection($senha);

    //Recupera senha criptografada (HASH)
    $hash = getUserHash($email);

    //Verifica se senha digitada é válida no banco
    //Tem que ser um array
    $dataPasswordVerify = ['email' => $email, 'senha' => $senha, 'hash' => $hash];

    if (passwordCheck($dataPasswordVerify) === false) {
        header('Location: ' . SITE_URL . 'index.php');
    } else {
        header('Location: ' . SITE_URL . 'dashboard.php');
    }
} else {
    header('Location: ' . SITE_URL . 'index.php');
}

/**
* Função para verificar se a senha digitada é a correta
* e verifica se houve alteração no algoritmo de HASH do PHP
* Caso positívo altera o algoritmo de HASH
* (esse procedimento não impede o acesso do usuário)
*/
//function passwordCheck($email, $senha, $hash)
function passwordCheck($params)
{
    if (password_verify($params['senha'], $params['hash'])) {
        if (password_needs_rehash($params['hash'], PASSWORD_DEFAULT, ['cost' => 10])) {
            $hash = password_hash($params['senha'], PASSWORD_DEFAULT, ['cost' => 10]);

            defineNewHash($params['hash']);
        }
        session_unset($_SESSION['error']);

        //Chama o método de para recuperaros dados do usuário
        getUserData($params['email']);
        return true;
    } else {
        $_SESSION['error'] = 'Senha invalida.';
        return false;
    }
}

/**
* Função para recuperar somente a senha do usuário
*/
function getUserHash($email)
{
    $conn = dbConnect();
    $senha = null;

    $sql = "SELECT senha FROM usuarios WHERE email = ? AND ativo = 'Sim'";
    $qry = mysqli_prepare($conn, $sql);

    if ($qry) {
        mysqli_stmt_bind_param($qry, 's', $email);

        mysqli_stmt_execute($qry);
        mysqli_stmt_bind_result($qry, $senha);

        if (mysqli_stmt_fetch($qry)){
            mysqli_stmt_close($qry);
            dbClose($conn);
            return $senha;
        } else {
            mysqli_stmt_close($qry);
            $_SESSION['error'] = 'E-mail invalido.';
            dbClose($conn);
            header('Location: ' . SITE_URL . 'index.php');
            exit;
        }
    } else {
        $_SESSION['error'] = 'E-mail invalido.';
        dbClose($conn);
        header('Location: ' . SITE_URL . 'index.php');
    }

}

/**
* Função para recuperar dados do usuário
*/
function getUserData($email)
{
    $con = dbConnect();

    $sql = "SELECT id, id_setor, nome, tipo ";
    $sql.= "FROM usuarios ";
    $sql.= "WHERE email = ? AND ativo = 'Sim'";

    $qry = mysqli_prepare($con, $sql);

    if ($qry) {
        mysqli_stmt_bind_param($qry, 's', $email);
        mysqli_stmt_execute($qry);
        mysqli_stmt_bind_result($qry, $id, $id_setor, $nome, $tipo);

        if (mysqli_stmt_fetch($qry)) {
            $_SESSION['id'] = $id;
            $_SESSION['id_setor'] = $id_setor;
            $_SESSION['nome'] = $nome;
            $_SESSION['tipo'] = $tipo;
        } else {
            $_SESSION['error'] = 'E-mail ou Senha invalido.';
        }

    } else {
        $_SESSION['error'] = 'E-mail ou Senha invalido.';
    }
    mysqli_stmt_close($qry);
    dbClose($con);
}

function defineNewHash($email, $hash)
{
    $con = dbConnect();

    $sql = "UPDATE usuarios SET senha = ? WHERE email = ? ";
    $qry = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($qry, 'ss', $email, $senha);
    mysqli_stmt_execute($qry);

    if (mysqli_affected_rows($con)) {
        $_SESSION['success'] =  'senha do usuário alterado com sucesso.';
        return true;
    } else {
        $_SESSION['error'] = 'Erro: Não foi possível alterar a senha do usuário';
        return false;
    }

    mysqli_stmt_close($qry);

    dbClose($con);
}
