<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>fgets(), ler arquivo simples</h1>

<?php
if ($arquivo = fopen('novo_arquivo1.txt', 'r')) {
    $linha = fgets($arquivo);

    echo htmlentities($linha); // lê a primeira linha do arquivo exibe

    fclose($arquivo);
} else {
    echo 'Erro: Não foi possível ler o arquivo.<br />';
}
?>
</body>
</html>