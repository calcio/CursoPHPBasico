<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Upload de arquivo e validação</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" 
        name="frmUpload" id="frmUpload" method="post" enctype="multipart/form-data">
        
        <label>Selecione uma magem:<br /></label>
        <input type="file" name="img" id="img">
        
        <br /><br />
        <label>Selecione um Documento:<br /></label>
        <input type="file" name="doc" id="doc">
        
        <br /><br />
        <input type="submit" name="enviar">
    </form>

    <?php

    if ($_POST) :
        var_dump($_FILES['img']);
        var_dump($_FILES['doc']);

        function validaNomeCampo($nomeCampo = null)
        {
            if ($nomeCampo) {
                return true;
            } else {
                echo '<strong>Erro: O nome do campo deve ser informado!</strong>';
                exit;
            }
            
        }

        function verificaCampoVazio($nomeCampo = nul, array $campo = null)
        {
            if ($_FILES[$nomeCampo]['size'] !== 0) {
                return true;
            } else {
                echo '<strong> - Nenhum arquivo <em>'. $nomeCampo .'</em> para ser enviado!<br /></strong>';
            }
            
        }
        
        function validaCampo(array $campo = null)
        {
            if (is_array($campo)) {
                return true;
            } else {
                echo '<strong>Erro: O Campo deve ser um array!</strong>';
                exit;
            }

            if ($campo) {
                return true;
            } else {
                echo '<strong>Erro: O Campo deve ser informado!</strong>';
                exit;
            }
        }

        function upload($nomeCampo = null, array $campo = null)
        {
            $dir = __DIR__ . '/upload/';

            if (validaNomeCampo($nomeCampo)) {
                if (validaCampo($campo)) {
                    $arquivo = $uploadfile = $dir . basename($_FILES[$nomeCampo]['name']);

                    if (move_uploaded_file($_FILES[$nomeCampo]['tmp_name'], $uploadfile)) {
                        echo "Arquivo válido e enviado com sucesso.<br />\n";
                    } else {
                        echo "Não foi possível gravar oarquivo<br />\n";
                    }
                }
            }
        }

        if (verificaCampoVazio('img', $_FILES['img'])) {
            //verificando se upload é uma imagem
            if (!empty($_FILES['img']) && ($_FILES['img']['type'] == 'image/jpeg' ||
            $_FILES['img']['type'] == 'image/jpg' ||
            $_FILES['img']['type'] == 'image/png' ||
            $_FILES['img']['type'] == 'image/gif')) :
                echo 'Grava a imagem no servidor ou banco. Para isso é necessário
                utilizar $_FILES["img"]["tmp_name"] e ter permissão de escrita no
                servidor.<br /><br />';

                upload('img', $_FILES['img']);

            else :
                echo 'Erro: Arquivo enviado não é uma imagem.<br /><br />';
            endif;
        }

        if (verificaCampoVazio('doc', $_FILES['doc'])) {
            //verificando se upload é um documento ou planílha ODF ou PDF
            if ($_FILES['doc']['type'] == 'application/vnd.oasis.opendocument.spreadsheet' ||
            $_FILES['doc']['type'] == 'application/vnd.oasis.opendocument.text' ||
            $_FILES['doc']['type'] == 'application/pdf') :
                echo 'Grava a imagem no servidor ou banco. Para isso é necessário
                utilizar $_FILES["doc"]["tmp_name"] e ter permissão de escrita no
                servidor.<br /><br />';

                upload('doc', $_FILES['doc']);

            else :
                echo 'Erro: Arquivo enviado não documento ou planílha ODF ou PDF.<br /><br />';
            endif;
        }

    endif;
    ?>
</body>
</html>