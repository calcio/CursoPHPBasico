<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/header.php';
showHeader();

require_once BASE_PATH . 'public/usuarios/queries.php';

if (isset($_REQUEST['id'])) :
    $id = trim($_REQUEST['id']);

    $user = getUserById($id);

    $nome  = $user['nome'];
    $email = $user['email'];
    $ativo = $user['ativo'];
    $tipo  = $user['tipo'];
    $sigla  = $user['sigla'];
    $setor  = $user['setor'];

else :
    header('location:' . SITE_URL . 'usuarios/index.php');
endif;

showMessage();
?>
        <div class="container">
            <h2>Detalhe do registro</h2><br />

            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th colspan="2" class="text-right">
                            <a href="<?= SITE_URL ?>usuarios/index.php"
                                class="btn btn-primary" title="Voltar">
                                <span class="glyphicon glyphicon-chevron-left"></span> Listar usuários
                            </a>
                            <a href="<?= SITE_URL ?>usuarios/form.php"
                                class="btn btn-primary" title="Novo registro">
                                <span class="glyphicon glyphicon-plus"></span> Novo
                            </a>
                            <a href="<?= SITE_URL ?>usuarios/form.php?id=<?= $id ?>"
                                class="btn btn-primary" title="Editar">
                                <span class="glyphicon glyphicon-edit"></span> Editar
                            </a>
                            <a href="#"
                                id = "<?= SITE_URL ?>usuarios/actions.php?action=delete&id=<?= $id ?>"
                                title="Excluir" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> Excluir
                            </a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-right"><strong>Nome:</strong></td>
                        <td><?= $nome ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-1 text-right"><strong>E-mail:</strong></td>
                        <td><?= $email ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-1 text-right"><strong>Setor:</strong></td>
                        <td><?= $sigla ?> (<?= $setor ?>)</td>
                    </tr>
                    <tr>
                        <td class="col-md-1 text-right"><strong>Tipo:</strong></td>
                        <td><?= $tipo ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-1 text-right"><strong>Ativo:</strong></td>
                        <td><?= $ativo ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../template/footer.php';
showFooter(['confirmDelete']);
