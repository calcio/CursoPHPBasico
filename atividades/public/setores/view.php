<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
require_once BASE_PATH . 'public/setores/queries.php';

if (isset($_REQUEST['id'])) :
    $id = trim($_REQUEST['id']);

    $sector = getSectorById($id);

    $sigla = $sector['sigla'];
    $nome  = $sector['nome'];
else :
    header('location:' . SITE_URL . 'setores/index.php');
endif;
?>
        <div class="container">
            <h2>Detalhe do registro</h2><br />

            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th colspan='2' class="text-right"><a href='<?= SITE_URL ?>setores/index.php' class="btn btn-primary">Voltar</a></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="col-md-1 text-right"><strong>Sigla:</strong></td>
                        <td><?= $sigla ?></td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Nome:</strong></td>
                        <td><?= $nome ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
