<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Atualizar usuario</h1>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();

        //consulta simples
        $sql = "UPDATE usuarios SET nome = 'Carlos Silva' WHERE id = 13";
        mysqli_query($con, $sql);

        if (mysqli_affected_rows($con)) {
            echo '<p>Usuário alterado com sucesso.</p>';
        } else {
            echo '<p>Erro: Não foi possível alterar o usuário</p>';
        }

        //liberira memória
        mysqli_free_result($qry);

        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>
