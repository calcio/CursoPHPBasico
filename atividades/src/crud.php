<?php

require_once dirname(__FILE__) . '/../config/constants.php';
require_once BASE_PATH . 'config/database.php';
require_once BASE_PATH . 'src/connection.php';
require_once BASE_PATH . 'src/prepareCrud.php';

/*
* Método público para inserir os dados na tabela
* @param $table = nome da tabela
* @param $params = Array de dados contendo colunas e valores
* @return Retorna resultado booleano da instrução SQL
*/
function insert($table, $params)
{
    // Atribui a instrução SQL construida no método
    $sql = buildInsert($table, $params);

    $conn = dbConnect();
    extract($params);

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', trim($sigla), trin($nome));

    if (!mysqli_stmt_execute($stmt)) {
        $return = false;
    } else {
        $return = true;
    }
    mysqli_stmt_close($stmt);
    dbClose($conn);

    return $return;
}

/*
* Método público para atualizar os dados na tabela
* @param $table = nome da tabela
* @param $params = Array de dados contendo colunas e valores
* @param $paramsCondicao = Array de dados contendo condições do update - Exemplo array('$id='=>1)
* @return Retorna resultado booleano da instrução SQL
*/
function update($table, $params, $paramsCondicao)
{
    // Atribui a instrução SQL construida no método
    $sql = buildUpdate($table, $params, $paramsCondicao);

    $conn = dbConnect();

    dbClose($conn);

    return $retorno;
}

/*
* Método público para excluir os dados na tabela
* @param $table = nome da tabela
* @param $paramsCondicao = Array de dados contendo condições do delete - Exemplo array('$id='=>1)
* @return Retorna resultado booleano da instrução SQL
*/
function delete($table, $paramsCondicao)
{
    // Atribui a instrução SQL construida no método
    $sql = buildDelete($table, $paramsCondicao);

    $conn = dbConnect();


    dbClose($conn);

    return $retorno;
}

/*
* Método genérico para executar instruções de consulta independente do nome da tabela passada
* @param $sql = Instrução SQL inteira contendo, nome das tabelas envolvidas, JOINS, WHERE, ORDER BY, GROUP BY e LIMIT
* @param $arrayParam = Array contendo somente os parâmetros necessários para clásusla WHERE
* @param $fetchAll  = Valor booleano com valor default TRUE indicando que serão retornadas várias linhas, FALSE retorna apenas a primeira linha
* @return Retorna array de dados da consulta em forma de objetos
*/
function getAll(array $columns = ['*'], $table, array $paramsCondicao)
{

    if ($paramsCondicao) {
        $condition = '';
    }


    $pagination = pagination();
}

function pagination()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // set number of records per page
    $recordsPerPage = 15;

    // calculate for the query LIMIT clause
    $fromRecordNum = ($recordsPerPage * $page) - $recordsPerPage;

    return ['recordsPerPage' => $recordsPerPage, 'fromRecordNum' => $fromRecordNum];
}

function getById(array $columns = ['*'], $table)
{

}

function getByParams(array $columns = ['*'], $table, array $paramsCondicao)
{

}
