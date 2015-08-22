<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>preg_replace()</h1>

<?php
$cpf = '234.144.675/26';
$cpf = preg_replace("/[^0-9]/", "", $cpf);
// O /.../ indica um intervalo, o ^ sgnifica negação, [0-9] somente número.
// Ou seja, substitua qualquer coisa que não seja número por nada.
echo 'CPF: ' . $cpf . '<br /><br />';

$string1 = "Copyright 1999 - 2015";
$string1 = preg_replace("([0-9]+)", "2000", $string1);
// O (...) indica uma expressão. Substitua qualquer expressão numérica para 2000.
echo $string1 . '<br /><br />';

$string1 = 'Abril 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
// \w indica os caracteres alfa (letras), \d equivalente ao [0-9], \i case insensitive
$replacement = '${1} 1, $3';
echo preg_replace($pattern, $replacement, $string1) . '<br /><br />';

$string2 = "Entre em contato comigo no email email@email.com, 
responderei quando puder.";
$string2 = preg_replace('/@([-\.0-9a-zA-Z]+)/', '@…', $string2);

echo $string2;
?>
</body>
</html>