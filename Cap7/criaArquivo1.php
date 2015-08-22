<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>Criar, ler e fechar o arquivos</h1>

<h2>fopen(), cria um arquivo se não existir ou abre um arquivo existente</h2>
<?php
$criaArquivo = fopen('novo_arquivo.txt', 'x'); //Cria o arquivo novo_arquivo.txt com permissao de escrita
?>

<h2>fwrite(), escreve no arquivo criado ou aberto</h2>
<?php
$escreve = fwrite($criaArquivo, 'Texto a ser inserido no arquivo. Pode ser substituído por uma variável contendo um texto longo');
?>

<h2>fclose(), fecha o arquivo criado ou aberto</h2>
<?php
fclose($criaArquivo);
?>
</body>
</html>