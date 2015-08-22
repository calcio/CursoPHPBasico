<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <?php
         echo '<h1>Exemplo 4</h2>
         <h2>Arrays Matriz</h2>';
         
         $compras = [
             'semana1' => [
                 'item1' => [
                     'produto' => 'Maça',
                     'valor' => 5.87,
                     'peso' => '1kg',
                 ],
                 'item2' => [
                     'produto' => 'Feijão',
                     'valor' => 3.77,
                     'peso' => '1kg',
                 ],
             ],
             'semana2' => [
                 'item1' => [
                     'produto' => 'Arroz',
                     'valor' => 7.27,
                     'peso' => '5kg',
                 ],
                 'item2' => [
                     'produto' => 'Feijão',
                     'valor' => 3.77,
                     'peso' => '1kg',
                 ],
                 'item3' => [
                     'produto' => 'Farinha',
                     'valor' => 2.01,
                     'peso' => '1kg',
                 ],
             ],
         ];
         
         //Exibindo todos os elementos do Array
         echo '<pre>';
         print_r($compras);
         echo '</pre>';
         
         //exibindo semana1
         echo '<pre>';
         print_r($compras['semana1']);
         echo '</pre>';
         
         //exibindo semana1 e o item2
         echo '<pre>';
         print_r($compras['semana1']['item2']);
         echo '</pre>';
         
         //exibindo individualmente o produto farinha
         echo 'Hoje eu comprei ' . $compras['semana2']['item3']['produto'];
?>
</body>
</body>
</html>