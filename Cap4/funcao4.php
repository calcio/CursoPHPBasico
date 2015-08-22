<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Função com argumento</h1>
    <?php
    //declaração da função
    function exibeNome($nome)
    {
        $texto = 'O nome escolhido foi: ' . $nome;
        return $texto;
    }

    $nome = 'Juraci José';
    //chamando a função a ser executada
    echo exibeNome($nome);
    ?>
</body>
</html>