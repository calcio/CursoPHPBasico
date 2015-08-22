<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <h1>Inserir usuarios</h1>
        <?php
        //importa o arquivo de conexão
        require_once('conexao.php');

        //abre a conexao com o banco
        $con = dbConnect();

        //define as variávels para o insert 1
        $nome1 = 'Carlos';
        $login1 = 'carlinhos';
        $senha1 = sha1('bobmarley');
        $email1 = 'carlos.silva.@bol.com.br';

        $sql = "INSERT INTO usuarios (nome, login, senha, 
            email) VALUES ('$nome1', '$login1', '$senha1', '$email1')";

        if (mysqli_query($con, $sql)) {
            echo '<p>Usuário inserido com sucesso.</p>';
        } else {
            echo '<p>Erro: Não foi possível inserir o usuário</p>';
        }

        //define as variávels para o insert 2
        $nome2 = 'José Carlos';
        $login2 = 'jcbomzao';
        $senha2 = sha1('123456789');
        $email2 = 'jcb33@ig.com.br';

        $sql = mysqli_prepare($con, "INSERT INTO usuarios (nome, login, senha,
            email) VALUES (?, ?, ?, ?)");

        mysqli_stmt_bind_param($sql, 'ssss', $nome2, $login2, $senha2, $email2);

        $qry = mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);

        if ($qry) {
            echo '<p>Usuário inserido com sucesso.</p>';
        } else {
            echo '<p>Erro: Não foi possível inserir o usuário</p>';
        }
        
        //fecha a conexao
        dbClose($con);
        ?>
    </body>
</html>