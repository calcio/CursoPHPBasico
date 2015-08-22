<?php
//Abre uma conexao com o banco de dados
function dbConnect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = 'BdLnx#1404';
    $db   = 'curso-php-basico';

    $con = mysql_connect($host, $user, $pass)
        or die (mysql_error());
    // Conecta ao banco de dados
    mysql_select_db($db) or die (mysql_error());

    return $con;
}

//Fecha a conexao com o banco de dados
function dbClose($con)
{
    mysql_close($con);
}

dbConnect();
