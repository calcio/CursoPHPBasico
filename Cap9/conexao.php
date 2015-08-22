<?php
//Abre uma conexao com o banco de dados
function dbConnect()
{
    $host = 'localhost';
    $user = 'root';
    $pass = 'BdLnx#1404';
    $db   = 'curso-php-basico';

    $con = mysqli_connect($host, $user, $pass, $db)
        or die (mysqli_connect_error($con));
    mysqli_set_charset($con, 'utf8') or die (mysqli_error());

    return $con;
}

//Fecha a conexao com o banco de dados
function dbClose($con)
{
    mysqli_close($con);
}
