<?php
header('Content-Type: text/html; charset=utf-8');

/*
* Construção da instrução SQL de INSERT
* @param $table = nome da tabela
* @param $params = Array de dados contendo colunas e valores
* @return String contendo instrução SQL
*/
function buildInsert($table, $params)
{
    $insert = createQueryStringInsert($params);

    // Retira vírgula do final da string
    $fields = removeFinalComma($insert, 'fields', ", ", 2);
    $values = removeFinalComma($insert, 'values', ", ", 2);

    // Concatena todas as variáveis e finaliza a instrução
    $sql = "INSERT INTO {$table} (" . $fields . ") VALUES (" . $values . ")";

    // Retorna string com instrução SQL
    return trim($sql);
}

/*
* Construção da instrução SQL de UPDATE
* @param $table = nome da tabela
* @param $params = Array de dados contendo colunas e valores
* @param $paramsCondicao = Array de dados contendo condições do update
* @return String contendo instrução SQL
*/
function buildUpdate($table, $params, $paramConditions)
{
    $sqlCondition = "";

    $update = createQueryStringUpdate($params);
    $filelds = removeFinalComma($update, 'fields', ", ", 2);

    if (!empty($paramConditions) || $paramConditions != '') {
        $conditions = createQueryStringCondition($paramConditions);
        $conditions = removeFinalComma($conditions, 'fields', "AND ", 4);
        $sqlCondition = " WHERE " . $conditions;
    }

    // Concatena todas as variáveis e finaliza a instrução
    $sql = "UPDATE {$table} SET " . $filelds . $sqlCondition;

    // Retorna string com instrução SQL
    return trim($sql);
}

/*
* Construção da instrução SQL de DELETE
* @param $table = nome da tabela
* @param $paramsCondicao = Array de dados contendo condições do delete
* @return String contendo instrução SQL
*/
function buildDelete($table, $paramConditions)
{
    $conditions = createQueryStringCondition($paramConditions);
    $conditions = removeFinalComma($conditions, 'fields', "AND ", 4);

    // Concatena todas as variáveis e finaliza a instrução
    $sql = "DELETE FROM {$table} WHERE " . $conditions;
    // Retorna string com instrução SQL
    return trim($sql);
}

/*
* Método genérico para executar instruções de consulta
* @param string $table = nome da tablea
* @param array options = contem as variáveis opções de consulta como
* os campos a serem selecionados WHRE, ORDER_BY, JOINS e parâmtros para paginação
* @return string $sql consulta montada
*/
function buildSelect($table, array $options = ['columns' => '*'])
{
    $sql = "SELECT " .
        $options['columns'] .
    ' FROM ' . $table;

    if (isset($options['join'])) {
        foreach ($options['join'] as $join) {
            $sql .= ' ' . $join['type'] . ' ';
            $sql .= $join['table'] . ' ON ';
            $sql .= $join['columns'];
        }
    }

    if (isset($options['where'])) {
        $conditions = createQueryStringCondition($options['where']);
        $conditions = removeFinalComma($conditions, 'fields', "AND ", 4);

        $sql .= ' WHERE ' . $conditions;
    }

    if (isset($options['order_by'])) {
        $sql .= ' ORDER BY ' . $options['order_by'];
    }

    if (isset($options['limit'])) {
        $sql .= ' LIMIT ' . $options['limit'];
    }
    
    return trim($sql);
}

/*
Monta uma string no formato chave = valor para queries
do tipo insert
*/
function createQueryStringInsert($params)
{
    $fields = '';
    $values = '';

    foreach ($params as $key => $value) {
        $fields .= $key . ', ';
        $values .= ' ?, ';
    }
    return ['fields' => $fields, 'values' => $values];
}


/*
Monta uma string no formato chave = valor para queries
do tipo update
*/
function createQueryStringUpdate($params)
{
    $fields = '';

    // Loop para montar a instrução com os campos e valores
    foreach ($params as $key => $value) {
       $fields .= $key . ' = ?, ';
    }

    return ['fields' => $fields];
}

/*
Monta uma string no formato chave = valor para queries
do tipo insert e update
*/
function createQueryStringCondition($params)
{
    $fields = '';

    foreach ($params as $key => $value) {
       $fields .= $key . ' = ? AND ';
    }

   return ['fields' => $fields];
}

/* Remove a última virgula no final da linha */
function removeFinalComma($arrayParams, $index = 'fields', $str = ",", $length = 2)
{
    return (substr($arrayParams[$index], - $length) == $str) ? trim(substr($arrayParams[$index], 0, (strlen($arrayParams[$index]) - $length))) : $arrayParams[$index] ;
}
