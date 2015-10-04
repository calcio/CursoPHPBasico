<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/status-atividade/queries.php';
require_once BASE_PATH . 'src/pagination.php';


//configurções para montar a paginação
$recordsPerPage = 10;
$totalRows = countRowsStatus();
$limit = returnLimitToQuery(['recordsPerPage' => $recordsPerPage]);

$status = getAllStatus(['limit' => $limit, 'offset' => $recordsPerPage]);
$params = ['recordsPerPage' => $recordsPerPage, 'totalRows' => $totalRows, 'url' => SITE_URL .'status-atividade/index.php'];

showMessage();
?>
        <div class="container">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><h2>Listagem de status de atividade</h2></div>
                <div class="panel-body text-right">
                    <a href="<?= SITE_URL ?>status-atividade/form.php"
                        class="btn btn-primary" title="Novo registro">
                        <span class="glyphicon glyphicon-plus"></span> Novo
                    </a>
                    <?php showTotalRegisters($totalRows); ?>
                </div>

                <?php if ($status['numRows'] == 0): ?>
                    <div class="alert alert-warning">
                        <h3 class="text-center">
                            <span class="glyphicon glyphicon-warning-sign"></span>
                            Nenhum registro encontrado
                        </h3>
                    </div>
                <?php else: ?>
                    <table class="table table-bordered table-striped table-condensed">
                        <thead class="alert-info">
                            <tr>
                                <th>Descrição do status da atividade</th>
                                <th class="col-md-2 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <?php showPagination($params); ?>
                                </td>
                            </tr>
                        </tfoot>

                        <tbody>
                        <?php for ($i = 0; $i <= $status['numRows']-1; $i++) : ?>
                            <tr>
                                <td><?= $status['result'][$i]['status'] ?></td>
                                <td class="col-md-2 text-center">
                                    <a href="<?= SITE_URL ?>status-atividade/view.php?id=<?= $status['result'][$i]['id'] ?>" title="Vizualizar">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= SITE_URL ?>status-atividade/form.php?id=<?= $status['result'][$i]['id'] ?>" title="Editar">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="#" id="<?= SITE_URL ?>status-atividade/actions.php?action=delete&id=<?= $status['result'][$i]['id'] ?>"
                                        title="Excluir"><span class="text-danger glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
