<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();
require_once BASE_PATH . 'public/status-atividade/queries.php';
require_once BASE_PATH . 'src/protectCSRF.php';

if (isset($_REQUEST['id'])) :
    $action = 'update';
    $id = trim($_REQUEST['id']);
    $status = getStatusById($id);

    $status  = $status['status'];

else :
    $action = 'insert';
    $id = null;
    $status  = null;
endif;

?>
        <div class="container">
            <h2>Cadastro de status de atividade</h2><br />

            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a href="<?= SITE_URL ?>status-atividade/index.php"
                        class="btn btn-primary" title="Voltar">
                        <span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                <?php if ($id) : ?>
                    <a href="#" id="<?= SITE_URL ?>status-atividade/actions.php?action=delete&id=<?= $id ?>"
                        title="Excluir" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Excluir</a>
                <?php endif; ?>
                </div>
            </div><br /><br />

            <form class="form-horizontal" action="<?= SITE_URL ?>status-atividade/actions.php" method="post">
                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="token" value="<?= tokenGenerate() ?>" />

                <div class="form-group">
                    <div class="row">
                        <label for="nome" class="col-md-2">Status da atividade:</label>

                        <div class="col-md-4">
                            <input type="nome" class="form-control" name="status" id="status" placeholder="nome do status" maxlength="200" value="<?= $status ?>" required><br />
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group text-center">
                    <br />
                    <button type="submit" class="btn btn-info">Gravar <span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" name="reset" class="btn btn-warning">Limpar <span class="glyphicon glyphicon-erase"></span></button>
                </div>
            </form>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
