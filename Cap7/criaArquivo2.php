<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>Cria arquivo pegando conteúdo externo</h1>

<?php
$conteudoExterno = file_get_contents('criaArquivo1.php'); //Pega o conteúdo do arquivo

if (@$arquivo = fopen('novo_arquivo1.txt', 'x')) {
    if (fwrite($arquivo, $conteudoExterno)) {
        echo 'Conteúdo inserido no arquivo com sucesso.<br />';
    } else {
        echo 'Erro: Não foi possível gravar o conteúdo no arquivo.<br />';
    }

    fclose($arquivo);
} else {
    echo 'Erro: Não foi possível criar o arquivo.<br />';
}
?>
</body>
</html>