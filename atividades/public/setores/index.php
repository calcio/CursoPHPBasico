<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/setores/queries.php';
require_once BASE_PATH . 'src/pagination.php';


//configurções para montar a paginação
$recordsPerPage = 10;
$totalRows = countRowsDepartment();
$limit = returnLimitToQuery(['recordsPerPage' => $recordsPerPage]);

$departments = getAllDepartment(['limit' => $limit, 'offset' => $recordsPerPage]);
$params = ['recordsPerPage' => $recordsPerPage, 'totalRows' => $totalRows, 'url' => SITE_URL .'setores/index.php'];

showMessage();
?>
        <div class="container">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><h2>Listagem de setores </h2></div>
                <div class="panel-body text-right">
                    <a href="<?= SITE_URL ?>setores/form.php"
                        class="btn btn-primary" title="Novo registro">
                        <span class="glyphicon glyphicon-plus"></span> Novo
                    </a>
                    <?php showTotalRegisters($totalRows); ?>
                </div>

                <?php if ($departments['numRows'] == 0): ?>
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
                                <th class="col-md-2 text-center">Sigla</th>
                                <th>Nome</th>
                                <th class="col-md-2 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-center">
                                    <?php showPagination($params); ?>
                                </td>
                            </tr>
                        </tfoot>

                        <tbody>
                        <?php for ($i = 0; $i <= $departments['numRows']-1; $i++) : ?>
                            <tr>
                                <td class="text-center"><?= $departments['result'][$i]['sigla'] ?></td>
                                <td><?= $departments['result'][$i]['nome'] ?></td>
                                <td class="col-md-2 text-center">
                                    <a href="<?= SITE_URL ?>setores/view.php?id=<?= $departments['result'][$i]['id'] ?>" title="Vizualizar">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= SITE_URL ?>setores/form.php?id=<?= $departments['result'][$i]['id'] ?>" title="Editar">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="#" id="<?= SITE_URL ?>setores/actions.php?action=delete&id=<?= $departments['result'][$i]['id'] ?>"
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
