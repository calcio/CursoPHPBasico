<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Testando se o e-mail foi enviado</h1>
    <?php
    $to = "calcionit@gmail.com";
    $subject = "Testando";

    $message = "
        <h1>Isso é um teste de envio</h1>
        <p>Aqui pode ir um texto longo, imagens e listas</p>
        <hr />
        <p>Pode incluir qualquer tag HTML e CSS também</p>
    ";

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
    $headers .= 'From: webmaster <webmaster@site.com.br>, alguém <alguem@site.com.br' . "\r\n";
    $headers .= 'Reply-To: webmaster <webmaster@site.com.br>' . "\r\n";
    $headers .= 'Cc: outromail@site.com.br, maisum@site.com.br' . "\r\n";
    $headers .= 'Bcc: outromail@site.com.br, maisum@site.com.br' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    
    if (mail($to, $subject, $message, $headers)) {
        echo '<strong>E-mail enviado com sucesso!</strong>';
    } else {
        echo '<strong>Erro: Não foi possível enviar o e-mail!</strong>';
    }
    ?>
</body>
</html>