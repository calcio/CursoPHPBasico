<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>file_get_contents(), lendo todo o arquivo com loop</h1>

<?php
if ($arquivo = file_get_contents('criaArquivo1.php')) {
        echo htmlentities($arquivo);
} else {
    echo 'Erro: Não foi possível ler o arquivo.<br />';
}
?>
</body>
</html>