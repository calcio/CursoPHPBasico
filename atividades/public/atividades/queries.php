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
function countRowsActivities()
{
    $connection = dbConnect();

    $options = [
        'columns' => 'count(id) as totalRows',
        'where' => ['id_responsavel' => $_SESSION['id']],
    ];

    $sql = buildSelect('atividades a', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
    mysqli_stmt_execute($stmt);

    $resultObject = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($resultObject, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    dbClose($connection);

    return $result[0]['totalRows'];
}

//Recupera todos os dados da tabela
function getAllActivitiesByUser($params){
    $connection = dbConnect();

    $options = [
        'columns' => 'a.id, ud.nome as demandante, s.sigla,
        sa.status, a.titulo, a.data, a.tempo_gasto, a.id_status',
        'join' => [
            ['type' => 'INNER JOIN', 'table' => 'setores s', 'columns' => 's.id = a.id_setor'],
            ['type' => 'INNER JOIN', 'table' => 'status_atividade sa', 'columns' => 'sa.id = a.id_status'],
            ['type' => 'INNER JOIN', 'table' => 'usuarios ud', 'columns' => 'ud.id = a.id_demandante'],
        ],
        'where' => ['a.id_responsavel' => $_SESSION['id']],
        'order_by' => 'a.data DESC',
        'limit' => $params['limit'] . ', ' . $params['offset'],
    ];

    $sql = buildSelect('atividades a', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION['id']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    mysqli_stmt_bind_result($stmt, $id, $demandante, $sigla, $status, $titulo, $data, $tempo_gasto, $id_status);

    $result = [];

    while (mysqli_stmt_fetch($stmt)) {
        array_push($result, [
            "id" => $id,
            "demandante" => $demandante,
            "sigla" => $sigla,
            "status" => $status,
            "titulo" => $titulo,
            "data" => $data,
            "tempo_gasto" => $tempo_gasto,
            "id_status" => $id_status,
        ]);
    }

    $numRows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);

    dbClose($connection);

    return ['result' => $result, 'numRows' => $numRows];
}

function getLastActivitiesByUserAndStatus($params)
{
    $connection = dbConnect();

    $options = [
        'columns' => 'id, titulo',
        'where' => ['id_status' => antiInjection($params['status']), 'id_responsavel' => $_SESSION['id']],
        'order_by' => 'data DESC',
        'limit' => antiInjection($params['limit']),
    ];

    $sql = buildSelect('atividades', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $params['status'], $_SESSION['id']);
    mysqli_stmt_execute($stmt);

    $resultObject = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($resultObject, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    dbClose($connection);

    return $result;
}

//Recupera todos os dados da tabela
function getListActivities(){
    $connection = dbConnect();

    $options = [
        'columns' => 'id, Atividades',
    ];

    $sql = buildSelect('atividades', $options);

    $qry = mysqli_query($connection, $sql);
    $result = mysqli_fetch_all($qry, MYSQLI_ASSOC);
    mysqli_free_result($qry);

    dbClose($connection);

    array_unshift($result, ['id' => '', 'nome' => '']);

    return $result;
}

function getActivitiesById($id)
{
    $connection = dbConnect();

    $options = [
        'columns' => 'a.id, a.id_demandante, a.id_responsavel, a.id_setor, a.id_status, a.descricao,
        ud.nome as demandante, s.sigla, sa.status, a.titulo, a.data, a.tempo_gasto',
        'join' => [
            ['type' => 'INNER JOIN', 'table' => 'setores s', 'columns' => 's.id = a.id_setor'],
            ['type' => 'INNER JOIN', 'table' => 'status_atividade sa', 'columns' => 'sa.id = a.id_status'],
            ['type' => 'INNER JOIN', 'table' => 'usuarios ud', 'columns' => 'ud.id = a.id_demandante'],
        ],
        'where' => ['a.id' => $id],
    ];

    $sql = buildSelect('atividades a', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $resultObject = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($resultObject, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    dbClose($connection);
    return $result[0];
}
