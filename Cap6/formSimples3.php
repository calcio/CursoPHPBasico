<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Curso Básico - PHP do Jeito Certo</title>
</head>
<body>
    <h1>Formulário simples 3</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" 
        name="frmSimples3" id="frmSimples3" method="post">
        <input type="hidden" name="opc" value="1">
        
        <label>Qual seu nível de conhecimento em PHP?<br /></label>
        <input type="radio" name='conhecimento' value='Não sei PHP'> Não sei PHP <br />
        <input type="radio" name='conhecimento' value='PHP Básico'> PHP Básico <br />
        <input type="radio" name='conhecimento' value='PHP Intermediário'> PHP Intermediário <br />
        <input type="radio" name='conhecimento' value='PHP Avançado'> PHP Avançado <br />
        <input type="radio" name='conhecimento' value='Jedi'> Jedi <br />
        
        <br />
        <label>Quais versão do PHP já utilizou?<br /></label>
        <input type="checkbox" name='versao[]' value='3.x'> 3.x <br />
        <input type="checkbox" name='versao[]' value='4.x'> 4.x <br />
        <input type="checkbox" name='versao[]' value='5.0'> 5.0 <br />
        <input type="checkbox" name='versao[]' value='5.3'> 5.3 <br />
        <input type="checkbox" name='versao[]' value='5.5'> 5.5 <br />

        <br /><br />
        <input type="submit" name="enviar">
    </form>

    <?php
    if (isset($_POST['opc']) == '1') :
        echo '<h2>Recuperando campos Checkbox e Radiobutton</h2>';

        echo 'Qual seu nível de conhecimento em PHP?<br />';
        echo 'R: ' . $_POST['conhecimento'] . '<br /><br />';
        
        echo 'Quais versão do PHP já utilizou?<br />';
        echo 'R: ' . $_POST['versao'][0] . '<br />'; //recupera o primeiro item selecionado
        var_dump($_POST['versao']); //Recupera todos os itens marcados
    endif;
    ?>
</body>
</html>