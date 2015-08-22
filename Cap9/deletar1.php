<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Deletar usuario</h1>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();

        //consulta simples
        $sql = "DELETE FROM usuarios WHERE id = 15";
        mysqli_query($con, $sql);

        if (mysqli_affected_rows($con)) {
            echo '<p>Usuário deletado com sucesso.</p>';
        } else {
            echo '<p>Erro: Não foi possível deletar o usuário</p>';
        }
        //liberira memória
        mysqli_free_result($qry);
        
        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>
