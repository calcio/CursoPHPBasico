<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>For com array</h1>
    <?php
    $vetor = array(1, 2, 3, 4, 5);

    for ($i = 0; $i < 5; $i++) {
        $item = $vetor[$i];
        echo $item . '<br />';
    }
    ?>
</body>
</body>
</html>