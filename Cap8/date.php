<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>date()</h1>

<?php
echo 'Data e hora padrão de banco de dados <strong>' . date('Y-m-d H:i:s') . '</strong><br />';
echo 'Data e hora padrão europeu <strong>' . date('d/m/Y H:i:s') . '</strong><br />';
echo 'Data com ano com 2 dígitos <strong>' . date('d/m/y') . '</strong><br />';
echo 'Somente hora <strong>' . date('H:i:s') . '</strong><br />';
echo 'Mês por extenso <strong>' . date('F') . '</strong><br />';
echo 'Mês com 3 letras <strong>' . date('M') . '</strong><br />';
echo 'Semana do ano <strong>' . date('W') . '</strong><br />';

?>
</body>
</html>