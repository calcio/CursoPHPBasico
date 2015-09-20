<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();
require_once BASE_PATH . 'public/setores/queries.php';

if (isset($_REQUEST['id'])) :
    $id = trim($_REQUEST['id']);

    $sector = getSectorById($id);

    $sigla = $sector['sigla'];
    $nome  = $sector['nome'];
else :
    header('location:' . SITE_URL . 'setores/index.php');
endif;

showMessage();
?>
        <div class="container">
            <h2>Detalhe do registro</h2><br />

            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th colspan="2" class="text-right">
                            <a href="<?= SITE_URL ?>setores/index.php"
                                class="btn btn-primary" title="Voltar">
                                <span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                            <a href="<?= SITE_URL ?>setores/form.php?id=<?= $id ?>"
                                class="btn btn-primary" title="Editar">
                                <span class="glyphicon glyphicon-edit"></span> Editar</a>
                            <a href="#"
                                id = "<?= SITE_URL ?>setores/actions.php?action=delete&id=<?= $id ?>"
                                title="Excluir" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> Excluir</a>
                        </th>
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
showFooter(['confirmDelete']);
