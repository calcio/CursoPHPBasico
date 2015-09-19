<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';
require_once BASE_PATH . 'config/database.php';
require_once BASE_PATH . 'src/connection.php';
require_once BASE_PATH . 'src/prepareCrud.php';

$post = $_POST;
unset($post['action']);
$id = isset($post['id']) ? $post['id'] : $_GET['id'];

$action = isset($_POST['action']) ? trim($_POST['action']) : trim($_GET['action']);

switch ($action) {
    case 'insert':
        unset($post['id']);

        if ($id = insert('setores', $post)) {
            $_SESSION['success'] = 'Registro gravado com sucesso. ';
        } else {
            $_SESSION['error'] = 'Não foi possível gravar o registro.';
        }

        header('location: ' . SITE_URL . 'setores/form.php?id=' . $id);
        break;

    case 'update':
        unset($post['id']);
        if (update('setores', $post, ['id' => $id])) {
            $_SESSION['success'] = 'Registro alterado com sucesso. ';
        } else {
            $_SESSION['error'] = 'Não foi possível aletrar o registro.';
        }

        header('location: ' . SITE_URL . 'setores/index.php');
        break;

    case 'delete':
        if (delete('setores', ['id' => $id])) {
            $_SESSION['success'] = 'Registro exluido com sucesso. ';
        } else {
            $_SESSION['error'] = 'Não foi possível excluir o registro.';
        }

        header('location: ' . SITE_URL . 'setores/index.php');
        break;
}

function insert($table, $params)
{
    // Atribui a instrução SQL construida no método
    $sql = buildInsert($table, $params);

    $conn = dbConnect();
    extract($params);

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $sigla, $nome);

    if (!mysqli_stmt_execute($stmt)) {
        $return = false;
    } else {
        $return = mysqli_insert_id($conn);
    }
    mysqli_stmt_close($stmt);
    dbClose($conn);

    return $return;
}

function update($table, $params, $paramConditions)
{
    // Atribui a instrução SQL construida no método
    $sql = buildUpdate($table, $params, $paramConditions);

    $conn = dbConnect();
    extract($paramConditions);
    extract($params);

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssi', $sigla, $nome, $id);

    if (!mysqli_stmt_execute($stmt)) {
        $return = false;
    } else {
        $return = true;
    }
    mysqli_stmt_close($stmt);

    dbClose($conn);

    return $return;
}

function delete($table, $paramConditions)
{
    // Atribui a instrução SQL construida no método
    $sql = buildDelete($table, $paramConditions);

    $conn = dbConnect();
    extract($paramConditions);

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (!mysqli_stmt_execute($stmt)) {
        $return = false;
    } else {
        $return = true;
    }
    mysqli_stmt_close($stmt);

    dbClose($conn);

    return $return;
}
