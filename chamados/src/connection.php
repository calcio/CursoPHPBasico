<?php
require_once BASE_PAHT . DS . '../config/database.php';

//connection set
//open db connection
function dbConnect()
{
    $con = mysqli_connect(HOST, USER, PASSWORD, DATABASE_NAME)
        or die (mysqli_connect_error($con));
    mysqli_set_charset($con, 'utf8') or die (mysqli_error());

    return $con;
}

//close db connection
function dbClose($con)
{
    mysqli_close($con);
}
