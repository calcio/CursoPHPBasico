$(document).ready(function(){
    /*
     * Função genérica para todos os eventos excluir
     * O [a href] deverá conter o atributo title com o valor Excluir
     * e o atributo id contento a URL do controller + id como parametro.
     *
     * ex: <a href="#" title="Excluir" id=""><span class="glyphicon glyphicon-trash"></span>Exluir</a>
     *
     */
    $('a[title="Excluir"]').on('click', function(){
        decisao = confirm('Realmente gostaria de excluir o registro?');
        
        if(decisao === true){
            var url = $(this).attr('id');
            window.location.replace(url);
        }
    });
});
