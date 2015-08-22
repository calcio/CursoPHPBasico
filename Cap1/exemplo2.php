<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <?php
    echo '<h1>Exemplo 2</h2>
    <h2>Arrays Simples</h2>';

    //Array simples com indice automático
    $frutas = array('Goiaba', 'Jaca', 'Uva', 'Cacau');
    echo '<pre>';
    print_r($frutas); 
    echo '</pre>';

    //Array simples com indice manual
    $frutas = array(3 => 'Goiaba', 6 => 'Jaca', 1 => 'Uva', 4 => 'Cacau');
    echo '<pre>';
    print_r($frutas); 
    echo '</pre>';        
    echo 'Exibindo um elemento do array $frutas ' . $frutas[6] . '<br />';
    
    //Outra forma de se montar um array
    $marcaCarro[0] = 'BMW';
    $marcaCarro[1] = 'Mercedes';
    $marcaCarro[2] = 'Porche';
    echo '<pre>';
    print_r($marcaCarro); 
    echo '</pre>';
    echo 'Exibindo um elemento do array $marcaCarro ' . $marcaCarro[0] . '<br />';
    ?>
</body>
</body>
</html>