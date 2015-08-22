<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Envio de e-mail usando o header</h1>
    <?php
    $to = "calcionit@gmail.com";
    $subject = "Testando";
    $message = "Isso é um teste de envio";
    $headers = 'From: webmaster@site.com.br' . "\r\n" .
    'Reply-To: webmaster@site.com.br' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    mail($to, $subject, $message, $headers);
?>
</body>
</html>