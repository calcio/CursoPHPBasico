<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Foreach chave valor</h1>
    <?php
    $motos = [
        1 => 'Suzuki',
        2 => 'Yamaha',
        3 => 'Honda',
        4 => 'Triumph',
        5 => 'Ducati'
    ];

    foreach ($motos as $key => $value) {
        echo $key . ' - ' . $value . '<br />';
    }
    ?>
</body>
</body>
</html>