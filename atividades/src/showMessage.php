<?php
function difineTypeMessage($messageType = MESSAGE_TYPE_ERRO, $message)
{
    if ($messageType == MESSAGE_TYPE_ERRO) {
        return error($message);
    } elseif ($messageType == MESSAGE_TYPE_WARNING) {
        return warning($message);
    } else {
        return success($message);
    }
}

function showMessage()
{
    if (isset($_SESSION['success'])) :
        echo difineTypeMessage($messageType = MESSAGE_TYPE_SUCCESS, $_SESSION['success']);
    endif;

    if (isset($_SESSION['error'])) :
        difineTypeMessage($messageType = MESSAGE_TYPE_ERRO, $_SESSION['error']);
    endif;

    if (isset($_SESSION['warning'])) :
        difineTypeMessage($messageType = MESSAGE_TYPE_WARNING, $_SESSION['warning']);
    endif;
}

function error($message)
{
    echo '
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Erro!</strong> ' . $message . '
            </div>
        </div>
    </div>
    ';

    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
}

function success($message)
{
    echo '
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Sucesso!</strong> ' . $message . '
            </div>
        </div>
    </div>
    ';

    if (isset($_SESSION['success'])) {
        unset($_SESSION['success']);
    }
}

function warning($message)
{
    echo '
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Alertasp&2013*
                !</strong> ' . $message . '
            </div>
        </div>
    </div>
    ';

    if (isset($_SESSION['warning'])) {
        unset($_SESSION['warning']);
    }
}
