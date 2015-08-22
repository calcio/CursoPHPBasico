<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>count()</h1>

<?php
$array = ['Pera', 'Uva', 'Maça', 'Mamão'];

var_dump($array);
echo '<br />Essa array contém <strong>' . count($array) . '</strong> itens';

?>
</body>
</html>