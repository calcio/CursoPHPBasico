<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Função com dos argumentos ou mais</h1>
    <?php
    //declaração da função
    function exibeNomeIdade($nome, $idade = 100)
    {
        $texto = 'O nome escolhido foi: ' . $nome . ' tenho ' . $idade . ' anos.';
        return $texto;
    }

    $nome = 'Juraci José';
    $idade = 27;
    //chamando a função a ser executada
    echo exibeNomeIdade($nome, $idade);
    ?>
</body>
</html>