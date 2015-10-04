<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();
require_once BASE_PATH . 'public/atividades/queries.php';
require_once BASE_PATH . 'public/setores/queries.php';
require_once BASE_PATH . 'public/usuarios/queries.php';
require_once BASE_PATH . 'public/status-atividade/queries.php';
require_once BASE_PATH . 'src/protectCSRF.php';

$plaintiffsList = getListUsers(); //Popula a selectbox Demandante;
$statusList   = getListStatus(); //Popula a selectbox Staus Atividade;

if (isset($_REQUEST['id'])) :
    $action = 'update';
    $id = trim($_REQUEST['id']);

    $activity = getActivitiesById($id);
    $setor = getDepartmentById($activity['id_setor']);

    $idSetor = $activity['id_setor'];
    $setorName = $setor['nome'];
    $idDemandante = $activity['id_demandante'];
    $idResponsavel = $activity['id_responsavel'];
    $idStatus = $activity['id_status'];
    $titulo = $activity['titulo'];
    $descricao  = nl2br($activity['descricao']);
    $data = date('d/m/Y', strtotime($activity['data']));
    $tempoGasto = $activity['tempo_gasto'];

else :
    $action = 'insert';
    $id = null;
    $idDemandante = null;
    $idSetor = null;
    $setorName = null;
    $idResponsavel = $_SESSION['id'];
    $idStatus = null;
    $titulo = null;
    $descricao  = null;
    $data = null;
    $tempoGasto = null;
endif;
?>
        <div class="container">
            <h2>Atividade</h2><br />

            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a href="<?= SITE_URL ?>atividades/index.php"
                        class="btn btn-primary" title="Voltar">
                        <span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                <?php if ($id) : ?>
                    <a href="#"
                        id="<?= SITE_URL ?>atividades/actions.php?action=delete&id=<?= $id ?>"
                        title="Excluir" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Excluir</a>
                <?php endif; ?>
                </div>
            </div><br /><br />

            <form class="form-horizontal" action="<?= SITE_URL ?>atividades/actions.php" method="post">
                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <input type="hidden" name="id_responsavel" id="id_responsavel" value="<?= $idResponsavel ?>">
                <input type="hidden" name="token" id="token" value="<?= tokenGenerate() ?>" />
                <input type="hidden" name="id_setor" id="id_setor" value="<?= $idSetor ?>" />

                <div class="form-group">
                    <div class="row">
                        <label for="responsavel" class="col-md-1">Responsável:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="responsavel" id="responsavel"
                                value="<?= $_SESSION['nome'] ?>" maxlength="200" disabled>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="demandante" class="col-md-1">Demandante:</label>
                        <div class="col-md-5">
                            <select class="form-control" name="id_demandante" id="id_demandante" required>
                                <?php
                                foreach ($plaintiffsList as $list) :
                                    if ($idDemandante == $list['id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?= $list['id'] ?>" <?= $selected?>><?= $list['nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="setor" class="col-md-1">Setor:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="setor"
                                id="setor" value="<?= $setorName ?>" disabled>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="titulo" class="col-md-1">Título:</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="titulo" id="titulo"
                            placeholder="título da atividade" maxlength="200" value="<?= $titulo ?>"
                            required>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="satus-atividade" class="col-md-1">Status atividade:</label>
                        <div class="col-md-5">
                            <select class="form-control" name="id_status" id="id_status" required>
                                <?php
                                foreach ($statusList as $list) :
                                    if ($idStatus == $list['id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?= $list['id'] ?>" <?= $selected?>><?= $list['status'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="descricao" class="control-label">
                        Descrição:
                        <span class="text-danger"><strong>*</strong></span>
                    </label><br/>
                    <textarea name="descricao" id="descricao" rows="8" cols="70" required><?= $descricao ?></textarea>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="senha" class="col-md-1">
                            Dia da tarefa:
                            <span class="text-danger"><strong>*</strong></span>
                        </label>
                        <div class="col-md-2">
                            <div class="input-group date" id="date-timepicker">
                                <input type="date" class="form-control text-center"
                                name="data" id="data" value="<?= $data ?>"
                                placeholder="01/01/1900" maxlength="10" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <label for="ativo" class="col-md-1">
                            Tempo gasto:
                            <span class="text-danger"><strong>*</strong></span>
                        </label>
                        <div class="col-md-2">
                            <div class="input-group date" id="time-timepicker">
                                <input type="time" class="form-control text-center"
                                name="tempo_gasto" id="tempo_gasto" value="<?= $tempoGasto ?>"
                                placeholder="00:05" maxlength="10" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <br />
                    <button type="submit" class="btn btn-info">Gravar
                        <span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" name="reset" class="btn btn-warning">Limpar
                        <span class="glyphicon glyphicon-erase"></span>
                    </button>
                </div>
            </form>
        </div>
        <br />
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete', 'ajaxFormActivities']);
