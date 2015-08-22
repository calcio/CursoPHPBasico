<!DOCTYPE html>
<html>
     <head>
         <meta charset="UTF-8">
         <title>Curso Básico - PHP do Jeito Certo</title>
     </head>
     <body>
        <?= '<h1>Bem-vindo ao PHP</h1>';
        echo '<h2>Variáveis e Constantes</h2>';
        //Isso é um comentário de uma linha
        //vamos estudar agora as variáveis
        $nome = 'Anna Clara'; //Variável tipo string
        $sobrenome = 'Da Fonseca'; //Variável tipo string
        $idade = 35;  //Variável tipo integer
        $altura = 69; //Variável tipo float
        $genteFina = true; //Variável tipo boolean
         
        /* Comentário em bloco muito usado para grandes descrições
        * Exibindo o resultado no navegador 
        */
        echo $nome . '<br />';
        echo $sobrenome . '<br />';
        echo $idade . "<br />";
        echo $altura . '<br />';
        echo $genteFina . '<br /><br />'; //Esse 1 representa um true (verdadeiro)
        
        //Agrupando as variáveis em um texto
        echo 'Olá meu nome é ' . $nome . ' ' . $sobrenome . '. <br />';
        echo 'Tenho ' . $idade . ' anos e minha altura é ' . $altura . 'm<br /><hr />';
         
        //Constantes
        define('SO', 'GNU/Linux Ubuntu'); //definindo uma constante
        define('FERRAMENTAS_ESCRITORIO', 'LibreOffice');
         
        echo 'Eu uso ' . SO . ' com ' . FERRAMENTAS_ESCRITORIO;
        echo '<br /> O Valor de PI é: ' . M_PI //Constante Interna do PHP
        ?>        
    </body>
</html>