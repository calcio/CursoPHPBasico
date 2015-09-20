<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();
require_once BASE_PATH . 'public/setores/queries.php';
require_once BASE_PATH . 'src/pagination.php';

$setores = getAllSectors();

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
                </div>

                <?php if ($setores['numRows'] == 0): ?>
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
                                    <?php showPagination(3, 6, SITE_URL .'setores/index.php'); ?>
                                    <!-- <nav>
                                        <ul class="pagination pagination-sm">
                                            <li class="disabled">
                                                <span>
                                                    <span aria-hidden="true">&laquo;</span>
                                                </span>
                                            </li>
                                            <li class="active">
                                                <span>1 <span class="sr-only">(current)</span></span>
                                            </li>
                                            <li>
                                                <a href="<?= SITE_URL ?>setores/index.php" aria-label="Next">
                                                    <span>2</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= SITE_URL ?>setores/index.php" aria-label="Next">
                                                    <span>3</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= SITE_URL ?>setores/index.php" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav> -->
                                </td>
                            </tr>
                        </tfoot>

                        <tbody>
                        <?php for ($i = 0; $i <= $setores['numRows']-1; $i++) : ?>
                            <tr>
                                <td class="text-center"><?= $setores['result'][$i]['sigla'] ?></td>
                                <td><?= $setores['result'][$i]['nome'] ?></td>
                                <td class="col-md-2 text-center">
                                    <a href="<?= SITE_URL ?>setores/view.php?id=<?= $setores['result'][$i]['id'] ?>" title="Vizualizar">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= SITE_URL ?>setores/form.php?id=<?= $setores['result'][$i]['id'] ?>" title="Editar">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>&nbsp;&nbsp;
                                    <a href="" id="<?= SITE_URL ?>setores/actions.php?action=delete&id=<?= $setores['result'][$i]['id'] ?>"
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
