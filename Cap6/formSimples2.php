<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Formulário simples 2 (GET)</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" 
        name="frmSimples2" id="frmSimples2" method="get">
        <input type="hidden" name="opc" value="1">
        
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" maxlength="150" size="50">
        
        <br />
        <label>E-mail:</label>
        <input type="text" name="email" id="email" maxlength="150" size="50">

        <br /><br />
        <input type="submit" name="enviar">
    </form>

    <?php
    if (isset($_GET['opc']) == '1') :
        echo '<h2>Recuperando campos de texto do tipo get</h2>';

        echo 'Nome: ' . $_GET['nome'];
        echo '<br />E-mail: ' . $_GET['email'];
    endif;
    ?>
</body>
</html>