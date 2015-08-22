<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Consultar usuarios</h1>
        <h2>Evitando SQL Injection</h2>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();
        $nome = '%Carlos%';

        //consulta preparada contra SQL Injection
        $sql = "SELECT id, nome, login, senha, email FROM usuarios WHERE nome LIKE ?";
        $result = mysqli_prepare($con, $sql); //Executa a consulta

        if ($result) {
            mysqli_stmt_bind_param($result, 's', $nome);
            mysqli_stmt_execute($result);
            mysqli_stmt_bind_result($result, $id, $nome, $login, $senha, $email);

            while (mysqli_stmt_fetch($result)) {
                echo $nome . '<br />';
            }
            
        } else {
            trigger_error('Statement failed: ' . mysqli_stmt_error($result), E_USER_ERROR);
        }

        mysqli_stmt_close($result);
        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>