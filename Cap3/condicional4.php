<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>If e Else</h1>
    <?php
    $cpf = '00000000000001';

    if ($cpf == "00000000000000" ||
        $cpf == "11111111111111" ||
        $cpf == "22222222222222" ||
        $cpf == "33333333333333" ||
        $cpf == "44444444444444" ||
        $cpf == "55555555555555" ||
        $cpf == "66666666666666" ||
        $cpf == "77777777777777" ||
        $cpf == "88888888888888" ||
        $cpf == "99999999999999") {
        echo "CPF inválido!";
    } else {
        echo "CPF informado: " . $cpf;
    }
    ?>
</body>
</body>
</html>