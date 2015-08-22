<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>If, Elseif e Else</h1>
    <?php
    $idade = 12;

    //Testa se usuario tem 18 anos ou mais
    if ($idade >= 18) {
        //retorna true
        echo 'Opa, ja posso dirigir e beber';
    } elseif ($idade >= 12 || $idade <= 17) {
        //retorna true se idade for maior ou
        //igual a 17 e menor e igual a 10
        echo 'Nao posso dirigir nem beber';
    } else {
        //retorna false
        echo 'Muito criança, nao vai nem para escola sozinho';
    }
    ?>
</body>
</body>
</html>