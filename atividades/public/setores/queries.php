<?php
header('Content-Type: text/html; charset=utf-8');

/*
* Esse arquivo serve para gerar qualquer tipo de consulta
* a função buildSelect, monta estruturas complexas de consulta
* verifique a documentação direto da própria função
* o primeiro parametro é o nome da tabela, o segundo é um array
*/

//Recupera todos os dados da tabela
function getAllSectors(){
    $connection = dbConnect();

    $options = [
        'columns' => 'id, sigla, nome',
        'order_by' => 'sigla, nome DESC',
    ];

    $sql = buildSelect('setores', $options);

    $qry = mysqli_query($connection, $sql);
    $result = mysqli_fetch_all($qry, MYSQLI_ASSOC);
    $numRows = mysqli_num_rows($qry);
    mysqli_free_result($qry);

    dbClose($connection);

    return ['result' => $result, 'numRows' => $numRows];
}

function getSectorById($id)
{
    $connection = dbConnect();

    $options = [
        'columns' => 'sigla, nome',
        'where' => ['id' => $id],
    ];

    $sql = buildSelect('setores', $options);

    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);

    $resultObject = mysqli_stmt_get_result($stmt);
    $result = mysqli_fetch_all($resultObject, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    dbClose($connection);

    return $result[0];
}
