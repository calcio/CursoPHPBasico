<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>switch e case</h1>
    <?php
    $beer = 'Colarinho';

    switch ($beer) {
        case 'Coruja':
        case 'ERDINGER':
        case 'Colarinho':
        case 'Paulaner':
            echo 'Ótimas cervejas!';
            break;
        case 'Colorado':
        case 'Rogue':
        case 'Perigosa':
            echo 'Cerveja muito amarga e parece caldo de cana!';
            break;
        default:
            echo 'Prefiro cervejas de trigo!';
            break;
    }
    ?>
</body>
</body>
</html>