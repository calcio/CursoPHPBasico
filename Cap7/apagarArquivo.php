<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>unlink(), apaga um arquivo</h1>

<?php
$arquivo = 'novo_arquivo1.txt';
if (file_exists($arquivo)) {
    if (unlink($arquivo)) {
        echo 'Arquivo deletado com sucesso.';
    } else {
        echo 'Erro: Não foi possível deletar o arquivo.';
    }
} else {
    echo 'Erro: Arquivo não encontrado.<br />';
}
?>
</body>
</html>