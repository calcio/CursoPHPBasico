<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>str_word_count()</h1>

<?php
$string = 'Mussum ipsum cacilds, vidis litro abertis. fonte: http://mussumipsum.com/';

echo $string;
echo '<br />Essa string tem <strong>' . str_word_count($string) . '</strong> palavras';
var_dump(str_word_count($string, 1)); // retorna um array contendo todas as palavras encontradas dentro de string
var_dump(str_word_count($string, 2)); // retorna um array associativo, onde a chave é a posição numérica da palavra
//dentro da string e o valor é a própria palavra. 
?>
</body>
</html>