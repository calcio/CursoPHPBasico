<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Envio de e-mail simples</h1>
    <?php
    $to = "calcionit@gmail.com";
    $subject = "Testando";
    $message = "Isso é um teste de envio";
    
    mail($to, $subject, $message);
?>
</body>
</html>