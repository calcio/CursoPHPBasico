<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Tratando form 2</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" 
        name="frmTrata2" id="frmTrata2" method="post">
        
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" maxlength="150" size="50">
        
        <br />
        <label>E-mail:</label>
        <input type="text" name="email" id="email" maxlength="150" size="50">
        
        <br />
        <label>Comentário:</label>
        <textarea name="comentario" id="comentario" cols="63" rows="10"></textarea>

        <br /><br />
        <input type="submit" name="enviar">
    </form>

    <?php
    if ($_POST) :
        echo '<br /><br />Nome: ' . htmlspecialchars(addslashes(trim($_POST['nome'])));
        echo '<br />E-mail: ' . htmlentities(addslashes(trim($_POST['email'])));
        echo '<br /><br />Nome: ' . addslashes(nl2br(trim($_POST['comentario'])));
    endif;
    ?>
</body>
</html>