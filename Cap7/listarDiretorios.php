<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>Listagem de diretórios</h1>

<h2>getcwd(), exibe o diretório atual</h2>
<?= getcwd() ?>

<h2>chdir(), muda o diretório atual</h2>
<?php
echo getcwd() . '<br />';
chdir('../Cap6');
echo getcwd() . '<br />';
chdir('upload');
echo getcwd() . '<br />';
?>

<h2>dir(), lista diretórios como uma lista</h2>
<?php
    $dir = dir('/var/');
    echo "Caminho: " . $dir->path . "\n<br />";

    /* Esta é a forma correta de varrer o diretório */
    while (false !== ($item = $dir->read())) {
       echo $item."\n<br />";
    }

    $dir->close();
?>

<h2>scandir(), lista diretórios como array</h2>
<?php
    $dir = scandir('/var/');
    var_dump($dir);
?>
</body>
</html>