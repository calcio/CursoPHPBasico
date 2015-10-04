<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/status-atividade/queries.php';

if (isset($_REQUEST['id'])) :
    $id = trim($_REQUEST['id']);

    $status = getStatusById($id);

    $status  = $status['status'];
else :
    header('location:' . SITE_URL . 'status-atividade/index.php');
endif;

showMessage();
?>
        <div class="container">
            <h2>Detalhe do registro</h2><br />

            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th colspan="2" class="text-right">
                            <a href="<?= SITE_URL ?>status-atividade/index.php"
                                class="btn btn-primary" title="Voltar">
                                <span class="glyphicon glyphicon-chevron-left"></span> Listar status de atividade
                            </a>
                            <a href="<?= SITE_URL ?>status-atividade/form.php"
                                class="btn btn-primary" title="Novo registro">
                                <span class="glyphicon glyphicon-plus"></span> Novo
                            </a>
                            <a href="<?= SITE_URL ?>status-atividade/form.php?id=<?= $id ?>"
                                class="btn btn-primary" title="Editar">
                                <span class="glyphicon glyphicon-edit"></span> Editar
                            </a>
                            <a href="#"
                                id = "<?= SITE_URL ?>status-atividade/actions.php?action=delete&id=<?= $id ?>"
                                title="Excluir" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> Excluir
                            </a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-right col-md-2"><strong>Status da atividade:</strong></td>
                        <td><?= $status ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
