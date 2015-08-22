<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>fgets(), lendo todo o arquivo com loop</h1>

<?php
if ($arquivo = fopen('novo_arquivo1.txt', 'r')) {
    while (!feof($arquivo)) {
        $linha = fgets($arquivo);
        echo htmlentities($linha) . '<br />';
    }

    fclose($arquivo);
} else {
    echo 'Erro: Não foi possível ler o arquivo.<br />';
}
?>
</body>
</html>