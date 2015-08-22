<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>strlen()</h1>

<?php
$string = 'Mussum ipsum cacilds, vidis litro abertis. fonte: http://mussumipsum.com/';

echo $string;
echo '<br />Essa string tem <strong>' . strlen($string) . '</strong> caracteres';

?>
</body>
</html>