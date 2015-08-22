<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
<h1>strtotime()</h1>

<?php
echo strtotime("now"), ' -> ', date('d/m/Y', strtotime("now")),'<br />';
echo strtotime("10 September 2000"), ' -> ', date('d/m/Y', strtotime("10 September 2000")),'<br />';
echo strtotime("+1 day"), ' -> ', date('d/m/Y', strtotime("+1 day")),'<br />';
echo strtotime("+1 week"), ' -> ', date('d/m/Y', strtotime("+1 week")),'<br />';
echo strtotime("+1 week 2 days 4 hours 2 seconds"), ' -> ', date('d/m/Y', strtotime("+1 week 2 days 4 hours 2 seconds")),'<br />';
echo strtotime("next Thursday"), ' -> ', date('d/m/Y', strtotime("next Thursday")),'<br />';
echo strtotime("last Monday"), ' -> ', date('d/m/Y', strtotime("last Monday")),'<br />';
echo date("jS F, Y", strtotime("11/12/10"));
?>
</body>
</html>