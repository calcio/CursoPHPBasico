<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>switch e case</h1>
    <?php
    $cor = 'verde1';

    switch ($cor) {
        case 'azul':
            echo 'A variável $cor é ' . $cor;
            break;

        case 'verde':
            echo 'A variável $cor é ' . $cor;
            break;

        default:
            echo 'A variável $cor é preto';
            break;
    }
    ?>
</body>
</body>
</html>