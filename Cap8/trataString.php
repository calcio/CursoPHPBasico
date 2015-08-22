<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>ucwords(), strtolower() e strtoupper()</h1>

<?php
$string = 'Mussum ipsum cacilds, vidis litro abertis. fonte: http://mussumipsum.com/';

echo $string . '<br /><br />';
echo 'usando a função <strong>ucwords()</strong>: ' . ucwords($string) . '<br />';
echo 'usando a função <strong>strtolower()</strong>: ' . strtolower($string) . '<br />';
echo 'usando a função <strong>strtoupper()</strong>: ' . strtoupper($string) . '<br />';

?>
</body>
</html>