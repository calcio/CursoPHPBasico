<?php
session_start();
require_once 'protecaoContraCSRF.php';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <?php
    //inicializando variáveis do form
    $nome = $email = $comentario = null;
    $erros = [];

    function exibeErros($campo = null, array $erros = null)
    {
        if (isset($erros[$campo])) {
            echo $erros[$campo];
            unset($erros[$campo]);
        }
    }
    
    //verifica se houve subimit
    if ($_POST) {
        if (verificaToken(isset($_POST['token']))) {
            extract($_POST);

            if (trim($nome) == "") {
                $erros['nome'] = '<br /><div><strong>Erro:</strong> O Campo <strong>nome</strong> deve ser preenchido.</div>';
            }
            
            if (trim($email) == "") {
                $erros['email'] = '<br /><div><strong>Erro:</strong> O Campo <strong>e-mail</strong> deve ser preenchido.</div>';
            }

            if (trim($comentario) == "") {
                $erros['comentario'] = '<br /><div><strong>Erro:</strong> O Campo <strong>comentário</strong> deve ser preenchido.</div>';
            }

            //Se não houver erro exibe os dados na tela
            if (empty($erros)) {
                echo 'Nome: ' . addslashes(trim($nome)) . '<br />';
                echo 'E-mail: ' .  addslashes(trim($email)) . '<br />';
                echo 'Comentário:<br /><br />' .  addslashes(trim(nl2br($comentario))) . '<br />';
            }
        }
    }
    ?>

    <h1>Evitando o CSRF (Cross Site Request Forgery)</h1>
    
    <form action="" name="frmCSRF" id="frmCSRF" method="post">
        <input type="hidden" name="token" value="<?= geraToken() ?>" />

        <label>Nome:</label>
        <input type="text" name="nome" id="nome" maxlength="150" size="50" value="<?= $nome ?>">
        <?= exibeErros('nome', $erros) ?>
        
        <br />
        <label>E-mail:</label>
        <input type="email" name="email" id="email" maxlength="150" size="50" value="<?= $email ?>">
        <?= exibeErros('email', $erros) ?>

        <br />
        <label>Comentário:<br /></label>
        <textarea name="comentario" id="comentario" cols="63" rows="10"><?= nl2br($comentario) ?></textarea>
        <?= exibeErros('comentario', $erros) ?>

        <br /><br />
        <input type="submit" name="enviar">
    </form>
</body>
</html>