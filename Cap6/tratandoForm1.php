<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Tratando form 1</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" 
        name="frmTrata1" id="frmTrata1" method="post">
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
    if (isset($_POST['opc']) == '1') :
        echo '<h2>Recuperando e tratando campos de texto do tipo post</h2>';
        echo 'Nome: ' . addslashes(trim($_POST['nome']));
        echo '<br /><br />Nome: ' . htmlspecialchars(trim($_POST['nome']), ENT_COMPAT); //padrão
        echo '<br />E-mail: ' . htmlspecialchars(trim($_POST['email']), ENT_QUOTES);
        echo '<br /><br />Nome: ' . htmlentities(trim($_POST['nome']));
        echo '<br />E-mail: ' . htmlentities(trim($_POST['email']));
        echo '<br /><br />Nome: ' . htmlspecialchars(addslashes(trim($_POST['nome'])));
        echo '<br />E-mail: ' . htmlentities(addslashes(trim($_POST['email'])));
    endif;
    ?>
</body>
</html>