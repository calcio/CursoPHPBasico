<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>checkdate()</h1>

<?php
echo 'Data 31/12/2000';
var_dump(checkdate(12, 31, 2000)); //mês, dia, ano

echo '<br />Data 29/02/2001';
var_dump(checkdate(2, 29, 2001)); //mês, dia, ano

$data = date('d/m/Y');
echo '<br />Data ' . $data;
var_dump(checkdate(substr($data, 3, 2), substr($data, 0, 2), substr($data, 7, 4))); //mês, dia, ano
?>
</body>
</html>