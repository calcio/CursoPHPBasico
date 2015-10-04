<?php

$options = ['cost' => 10];
$senha = password_hash ('123456789', PASSWORD_DEFAULT, $options);

echo $senha . '<br><br>';
