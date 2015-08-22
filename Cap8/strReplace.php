<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>str_replace()</h1>

<?php
//substituição com string
$string = 'O gato roeu a roupa do rei de Roma.';
$novaString = str_replace('gato', 'rato', $string);
echo $novaString . '<br /><br />';

//substituição com arrays
$frase  = "você comeria frutas, vegetais, e fibra todos os dias.";
$saudavel = array("frutas", "vegetais", "fibra");
$saboroso   = array("pizza", "cerveja", "sorvete");
$novafrase = str_replace($saudavel, $saboroso, $frase);
echo $novafrase;
?>
</body>
</html>