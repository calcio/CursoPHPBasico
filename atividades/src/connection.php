<?php
require_once BASE_PATH . DS . 'config/database.php';

function dbConnect()
{
    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE_NAME)
        or die (mysqli_connect_error($connection));
    mysqli_set_charset($connection, 'utf8') or die (mysqli_error());

    return $connection;
}

function dbClose($connection)
{
    mysqli_close($connection);
}

function antiInjection($str)
{
    // Remove palavras suspeitas de injection.
    $badString = "/(\n|\r|%0a|%0d|Content-Type:|bcc:|to:|cc:|Autoreply:|#|";
    $badString .= "from|select|insert|delete|where|drop table|show tables|";
    $badString .= "FROM|SELECT|INSERT|DELETE|WHERE|DROP TABLE|SHOW TABLES|";
    $badString .= "\*|--|\\\\)/";

    $str = preg_replace($badString, '', $str);
    $str = trim($str);        // Remove espaços vazios.
    $str = strip_tags($str);  // Remove tags HTML e PHP.
    $str = addslashes($str);  // Adiciona barras invertidas à uma string.

    return $str;
}
