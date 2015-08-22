<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Consultar usuarios</h1>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();
        $nome = 'Carlos';

        //consulta simples
        $sql1 = "SELECT id, nome, login, senha, email FROM usuarios WHERE nome LIKE '%$nome%'";
        $result = mysqli_query($con, $sql1); //Executa a consulta

        $dados1 = mysqli_fetch_array($result);
        $dados2 = mysqli_fetch_assoc($result);

        var_dump($dados1);
        var_dump($dados2);

        //acessando dados do mysqli_fetch_array()
        echo '<br>Nome: ' . $dados1[1] . ', E-mail: ' . $dados1['email'];

        //acessando dados do mysqli_fetch_assoc()
        echo '<br>Nome: ' . $dados2['nome'] . ', E-mail: ' . $dados2['email'];
        
        mysqli_free_result($result);
        
        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>