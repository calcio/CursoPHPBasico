$(document).ready(function(){
    $('#date-timepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'pt-br'
    });

    $('#time-timepicker').datetimepicker({
        format: 'LT',
        locale: 'pt-br'
    });

    $('#id_demandante').change(function(){
        var url =
            window.location.protocol + "//" +
            window.location.host + "/" +
            'CursoPHP/PHPBasico/atividades/public/atividades/actions.php';

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id: $('#id_demandante').val(),
                action: 'ajaxPopulateDepartment',
                token: $('#token').val()
            },
            dataType: 'json',

            success: function(dataJson) {
                $('#setor').val(dataJson.nome);
                $('#id_setor').val(dataJson.id);
            }
        });
    });
});
