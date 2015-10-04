<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/usuarios/queries.php';
require_once BASE_PATH . 'public/setores/queries.php';
require_once BASE_PATH . 'src/protectCSRF.php';

$activeList = ['' => '', 'Sim' => 'Sim', 'Não' => 'Não'];
$departmentList = getListDepartments(); //Popula a selectbox Setores;
$typeList  = ['' => '', 'Administrador' => 'Administrador', 'Usuário' => 'Usuário'];
$disabled = null;

if (isset($_REQUEST['id'])) :
    $action = 'update';
    $id = trim($_REQUEST['id']);

    $user = getUserById($id);

    $nome  = $user['nome'];
    $email = $user['email'];
    $senha = null;
    $ativo = $user['ativo'];
    $id_setor = $user['id_setor'];
    $tipo  = $user['tipo'];
    $disabled = 'disabled';
else :
    $action = 'insert';
    $id = null;
    $nome  = null;
    $email = null;
    $senha = null;
endif;

?>
        <div class="container">
            <h2>Cadastro de usuários</h2>

            <div class="row">
                <div class="col-md-6 col-md-offset-6">
                    <a href="<?= SITE_URL ?>usuarios/index.php"
                        class="btn btn-primary" title="Voltar">
                        <span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>
                <?php if ($id) : ?>
                    <a href="#" id="<?= SITE_URL ?>usuarios/actions.php?action=delete&id=<?= $id ?>"
                        title="Excluir" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Excluir</a>
                <?php endif; ?>
                </div>
            </div><br /><br />

            <form class="form-horizontal" action="<?= SITE_URL ?>usuarios/actions.php" method="post">
                <input type="hidden" name="action" value="<?= $action ?>">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="token" value="<?= tokenGenerate() ?>" />

                <div class="form-group">
                    <div class="row">
                        <label for="nome" class="col-md-1">Nome: </label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="nome"
                            id="nome" value="<?= $nome ?>" placeholder="nome completo"
                            maxlength="200" required>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="email"  class="col-md-1">Email: </label>
                        <div class="col-md-5">
                            <input type="email" class="form-control" name="email"
                            id="email" value="<?= $email ?>" placeholder="seu e-mail"
                            maxlength="200" required>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="senha" class="col-md-1">Senha: </label>
                        <div class="col-md-3">
                            <input type="password" class="form-control" name="senha"
                            id="senha" placeholder="sua senha" maxlength="20"
                            <?= $disabled ?>>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>

                        <label for="ativo" class="col-md-1">Ativo?</label>
                        <div class="col-md-1">
                            <select class="form-control" name="ativo" id="ativo" required>
                            <?php
                            foreach ($activeList as $id => $value) :
                                if ($id == $ativo) {
                                    $selected = "selected";
                                } else {
                                    $selected = '';
                                }
                            ?>
                                <option value="<?= $id ?>" <?= $selected?>><?= $value ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="setor" class="col-md-1">Setor: </label>
                        <div class="col-md-3">
                            <select class="form-control" name="id_setor" id="id_setor" required>
                                <?php
                                foreach ($departmentList as $lista) :
                                    if ($id_setor == $lista['id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?= $lista['id'] ?>" <?= $selected?>>
                                        <?= $lista['sigla'] ?> - <?= $lista['nome'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="tipo" class="col-md-1">Tipo do usuário:</label>

                        <div class="col-md-3">
                            <select class="form-control" name="tipo" id="tipo" required>
                                <?php foreach ($typeList as $id => $value) :
                                    if ($id == $tipo) {
                                        $selected = "selected";
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?= $id ?>" <?= $selected?>><?= $value ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <span class="text-danger"><strong>*</strong></span>
                    </div>
                </div>

                <div class="form-group text-center">
                    <br /><br />
                    <button type="submit" class="btn btn-info">Gravar <span class="glyphicon glyphicon-ok"></span></button>&nbsp;&nbsp;&nbsp;
                    <button type="reset" name="reset" class="btn btn-warning">Limpar <span class="glyphicon glyphicon-erase"></span></button>
                </div>
            </form>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete', 'ajaxFormUsuarios']);
