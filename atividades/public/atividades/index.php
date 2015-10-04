<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/atividades/queries.php';
require_once BASE_PATH . 'src/pagination.php';

//configurções para montar a paginação
$recordsPerPage = 10;
$totalRows = countRowsActivities();
$limit = returnLimitToQuery(['recordsPerPage' => $recordsPerPage]);

$activities = getAllActivitiesByUser(['limit' => $limit, 'offset' => $recordsPerPage]);

$params = ['recordsPerPage' => $recordsPerPage, 'totalRows' => $totalRows, 'url' => SITE_URL .'atividades/index.php'];

showMessage();
?>
        <div class="container">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><h2>Listagem atividade</h2></div>
                <div class="panel-body text-right">
                    <a href="<?= SITE_URL ?>atividades/form.php"
                        class="btn btn-primary" title="Novo registro">
                        <span class="glyphicon glyphicon-plus"></span> Novo
                    </a>
                    <?php showTotalRegisters($totalRows); ?>
                </div>

                <?php if ($totalRows == 0): ?>
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
                                <th class="col-md-5">Titulo</th>
                                <th class="col-md-3">Demandante</th>
                                <th class="col-md-1 text-center">Setor</th>
                                <th class="col-md-1 text-center">Status</th>
                                <th class="col-md-1 text-center">Data</th>
                                <th class="col-md-1 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <?php showPagination($params); ?>
                                </td>
                            </tr>
                        </tfoot>

                        <tbody>
                        <?php for ($i = 0; $i <= $activities['numRows']-1; $i++) : ?>
                            <tr>
                                <td><?= $activities['result'][$i]['titulo'] ?></td>
                                <td><?= $activities['result'][$i]['demandante'] ?></td>
                                <td class="text-center"><?= $activities['result'][$i]['sigla'] ?></td>
                                <td class="text-center"><?= $activities['result'][$i]['status'] ?></td>
                                <td class="text-center"><?= date('d/m/Y', strtotime($activities['result'][$i]['data'])) ?></td>
                                <td class="col-md-2 text-center">
                                    <a href="<?= SITE_URL ?>atividades/view.php?id=<?= $activities['result'][$i]['id'] ?>" title="Vizualizar">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>

                                    <?php if ($activities['result'][$i]['id_status'] != 2) : ?>&nbsp;&nbsp;
                                    <a href="<?= SITE_URL ?>atividades/form.php?id=<?= $activities['result'][$i]['id'] ?>" title="Editar">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="#" id="<?= SITE_URL ?>atividades/actions.php?action=delete&id=<?= $activities['result'][$i]['id'] ?>"
                                        title="Excluir"><span class="text-danger glyphicon glyphicon-trash"></span>
                                    </a>
                                    <?php endif; ?>
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
