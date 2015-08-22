<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Deletar usuario</h1>
        <h2>Evitando SQL Injection</h2>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();
        $id = 16;

        //consulta preparada contra SQL Injection
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $result = mysqli_prepare($con, $sql); //Executa a consulta
        mysqli_stmt_bind_param($result, 'i', $id);
        mysqli_stmt_execute($result);

        if (mysqli_affected_rows($con)) {
            echo '<p>Usuário deletado com sucesso.</p>';
        } else {
            echo '<p>Erro: Não foi possível deletar o usuário</p>';
        }
        //liberira memória
        mysqli_stmt_close($result);

        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>
