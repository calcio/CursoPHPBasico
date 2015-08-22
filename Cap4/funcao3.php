<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Função sem argumento com variável global</h1>
    <?php
    $valor1 = 100;
    //declaração da função
    function soma()
    {
        global $valor1;
        $valor2 = 30;
        echo  $valor1 + $valor2;
    }

    //chamando a função a ser executada
    soma();
    //valor fora do escopo da função
    echo '<br />' . $valor1;
    ?>
</body>
</html>