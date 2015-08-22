<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>explode()</h1>

<?php
$str = 'carro|moto|bike|ônibus';

$string1 = explode('|', $str); //explode a string inteira
var_dump($string1);

$string2 = explode('|', $str, 3); //explode somente até a terceira ocorrência
var_dump($string2);
?>
</body>
</html>