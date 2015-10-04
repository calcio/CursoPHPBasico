<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/atividades/queries.php';

if (isset($_REQUEST['id'])) :
    $id = trim($_REQUEST['id']);

    $activity = getActivitiesById($id);

    $demandante = $activity['demandante'];
    $setor = $activity['sigla'];
    $status = $activity['status'];
    $idStatus = $activity['id_status'];
    $titulo = $activity['titulo'];
    $descricao = nl2br($activity['descricao']);
    $data = date('d/m/Y', strtotime($activity['data']));
    $tempoGasto = $activity['tempo_gasto'];

else :
    header('location:' . SITE_URL . 'atividades/index.php');
endif;

showMessage();
?>
        <div class="container">
            <h2>Detalhe do registro</h2><br />

            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th colspan="2" class="text-right">
                            <a href="<?= SITE_URL ?>atividades/index.php"
                                class="btn btn-primary" title="Voltar">
                                <span class="glyphicon glyphicon-chevron-left"></span> Listar status de atividade
                            </a>
                            <a href="<?= SITE_URL ?>atividades/form.php"
                                class="btn btn-primary" title="Novo registro">
                                <span class="glyphicon glyphicon-plus"></span> Novo
                            </a>

                            <?php if ($idStatus != 2) : ?>
                            <a href="<?= SITE_URL ?>atividades/form.php?id=<?= $id ?>"
                                class="btn btn-primary" title="Editar">
                                <span class="glyphicon glyphicon-edit"></span> Editar
                            </a>
                            <a href="#"
                                id = "<?= SITE_URL ?>atividades/actions.php?action=delete&id=<?= $id ?>"
                                title="Excluir" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> Excluir
                            </a>
                            <?php endif; ?>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-right col-md-2"><strong>Demandande:</strong></td>
                        <td><?= $demandante ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Setor:</strong></td>
                        <td><?= $setor ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Status:</strong></td>
                        <td><?= $status ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Titulo:</strong></td>
                        <td><?= $titulo ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Descricao:</strong></td>
                        <td><?= $descricao ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Data:</strong></td>
                        <td><?= $data ?></td>
                    </tr>
                    <tr>
                        <td class="text-right col-md-2"><strong>Tempo gasto:</strong></td>
                        <td><?= $tempoGasto ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
