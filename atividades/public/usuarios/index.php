<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/usuarios/queries.php';
require_once BASE_PATH . 'src/pagination.php';

//configurções para montar a paginação
$recordsPerPage = 10;
$totalRows = countRowsUsers();
$limit = returnLimitToQuery(['recordsPerPage' => $recordsPerPage]);

$users = getAllUsers(['limit' => $limit, 'offset' => $recordsPerPage]);
$params = ['recordsPerPage' => $recordsPerPage, 'totalRows' => $totalRows, 'url' => SITE_URL .'usuarios/index.php'];

showMessage();
?>
        <div class="container">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"><h2>Listagem de usuários</h2></div>
                <div class="panel-body text-right">
                    <a href="<?= SITE_URL ?>usuarios/form.php"
                        class="btn btn-primary" title="Novo registro">
                        <span class="glyphicon glyphicon-plus"></span> Novo
                    </a>
                    <?php showTotalRegisters($totalRows); ?>
                </div>

                <?php if ($users['numRows'] == 0): ?>
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
                                <th class="col-md-5" >Nome</th>
                                <th class="col-md-1 text-center">Setor</th>
                                <th class="col-md-1 text-center">Ativo?</th>
                                <th class="col-md-1 text-center">Tipo</th>
                                <th class="col-md-2 text-center">Último login</th>
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
                        <?php for ($i = 0; $i <= $users['numRows']-1; $i++) : ?>
                            <tr>
                                <td><?= $users['result'][$i]['nome'] ?></td>
                                <td class="text-center"><?= $users['result'][$i]['sigla'] ?></td>
                                <td class="text-center"><?= $users['result'][$i]['ativo'] ?></td>
                                <td class="text-center"><?= $users['result'][$i]['tipo'] ?></td>
                                <td class="text-center"><?= date('d/m/Y h:i:s', strtotime($users['result'][$i]['ultimo_login'])) ?></td>
                                <td class="text-center">
                                    <a href="<?= SITE_URL ?>usuarios/view.php?id=<?= $users['result'][$i]['id'] ?>" title="Vizualizar">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= SITE_URL ?>usuarios/form.php?id=<?= $users['result'][$i]['id'] ?>" title="Editar">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="#" id="<?= SITE_URL ?>usuarios/actions.php?action=delete&id=<?= $users['result'][$i]['id'] ?>"
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
