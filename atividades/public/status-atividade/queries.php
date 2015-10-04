<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';
require_once BASE_PATH . 'src/sessionVerify.php';

checkUserLogedIn();

/*
* Esse arquivo serve para gerar qualquer tipo de consulta
* a função buildSelect, monta estruturas complexas de consulta
* verifique a documentação direto da própria função
* o primeiro parametro é o nome da tabela, o segundo é um array
*/
function countRowsStatus()
{
    $connection = dbConnect();
    $options = [
        'columns' => 'count(id) as totalRows',
    ];
    $sql = buildSelect('status_atividade', $options);
    $qry = mysqli_query($connection, $sql);
    $result = mysqli_fetch_array($qry, MYSQLI_ASSOC);
    mysqli_free_result($qry);

    dbClose($connection);

    return $result['totalRows'];
}

//Recupera todos os dados da tabela
function getAllStatus($params){
    $connection = dbConnect();

    $options = [
        'columns' => 'id, status',
        'order_by' => 'status ASC',
        'limit' => $params['limit'] . ', ' . $params['offset'],
    ];

    $sql = buildSelect('status_atividade', $options);

    $qry = mysqli_query($connection, $sql);
    $result = mysqli_fetch_all($qry, MYSQLI_ASSOC);
    $numRows = mysqli_num_rows($qry);
    mysqli_free_result($qry);

    dbClose($connection);

    return ['result' => $result, 'numRows' => $numRows];
}

//Recupera todos os dados da tabela
function getListStatus(){
    $connection = dbConnect();

    $options = [
        'columns' => 'id, status',
    ];

    $sql = buildSelect('status_atividade', $options);

    $qry = mysqli_query($connection, $sql);
    $result = mysqli_fetch_all($qry, MYSQLI_ASSOC);
    mysqli_free_result($qry);

    dbClose($connection);

    array_unshift($result, ['id' => '', 'status' => '']);

    return $result;
}

function getStatusById($id)
{
    $connection = dbConnect();

    $options = [
        'columns' => 'id, status',
        'where' => ['id' => $id],
    ];

    $sql = buildSelect('status_atividade', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $resultObject = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($resultObject, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    dbClose($connection);

    return $result[0];
}
