<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>crypt(), md5(), sha1() e base64_encode()</h1>

<?php
$string = '123456789';

echo 'A string <strong>' . $string . '</strong> usando a função <strong>crypt()</strong> é exibida assim: <strong>' . crypt($string) . '</strong>. <br />';
echo 'A string <strong>' . $string . '</strong> usando a função <strong>md5()</strong> é exibida assim: <strong>' . md5($string) . '</strong>. <br />';
echo 'A string <strong>' . $string . '</strong> usando a função <strong>sha1()</strong> é exibida assim: <strong>' . sha1($string) . '</strong>. <br />';
echo 'A string <strong>' . $string . '</strong> usando a função <strong>base64_encode()</strong> é exibida assim: <strong>' . base64_encode($string) . '</strong>. <br />';
?>
</body>
</html>