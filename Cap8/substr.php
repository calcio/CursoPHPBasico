<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>substr()</h1>

<?php
$string = 'Mussum ipsum cacilds, vidis litro abertis. fonte: http://mussumipsum.com/';

$subString1 = substr($string, 0, 5); //Mussum;
$subString2 = substr($string, 27, 13); //litro abertis

echo $string . '<br /><br />';
echo 'Primeira substring: ' . $subString1 . '<br />';
echo 'Segunda substring: ' . $subString2 . '<br />';

echo '<br /><br />';

$arquivo = '../Cap7/novo_arquivo.txt';
if (file_exists($arquivo)) {
    $arquivo = fopen($arquivo, 'r');
    $linha = fgets($arquivo);

    echo htmlentities($linha) . '<br />';
    $subString3 = substr($linha, 24, 8); //Arquivo
    echo 'Terceira substring: ' . $subString3 . '<br />';
} else {
    echo 'Erro: Arquivo não encontrado.<br />';
}

?>
</body>
</html>