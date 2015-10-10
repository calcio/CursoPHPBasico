$(document).ready(function(){
    $('#senha').blur(function(){
        passwordValidate();
    });

    $(':submit').click(function(){
        passwordValidate();
    });

    function passwordValidate() {
        var url =
            window.location.protocol + "//" +
            window.location.host + "/" +
            'CursoPHP/PHPBasico/atividades/public/usuarios/passwordIsStrong.php';

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                senha: $('#senha').val()
            },
            dataType: 'json',

            success: function(dataJson) {
                if (dataJson === false) {
                    alert('Sua senha é muito fraca! \nUtilize pelo menos: \n\nOito caracteres; \nUm número; \nUm caracter especial; \nUma letra maíuscula; \nUma letra minúscula.');
                }
            }
        });
    }
});
