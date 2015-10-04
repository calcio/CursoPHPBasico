<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'template/header.php';
showHeader();

require_once BASE_PATH . 'public/atividades/queries.php';

$atividadesPendentes   = getLastActivitiesByUserAndStatus(['limit' => 10, 'status' => 3]);
$atividadesEmAndamento = getLastActivitiesByUserAndStatus(['limit' => 10, 'status' => 1]);
$atividadesResolvidas  = getLastActivitiesByUserAndStatus(['limit' => 10, 'status' => 2]);
?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-danger">
                    <div class="panel-heading text-center">
                        <h3 class="text-danger">
                            <span class="glyphicon glyphicon-flag"></span> Atividades pendentes
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                        <?php
                        if (count($atividadesPendentes) > 0) :
                            foreach ($atividadesPendentes as $pendente) :
                        ?>
                            <li><span class="glyphicon glyphicon-flag"></span> <a href="<?= SITE_URL ?>atividades/view.php?id=<?= $pendente['id'] ?>"><?= $pendente['titulo'] ?></a></li>
                        <?php
                            endforeach;
                        else:
                            echo "Nenhuma atividade pendente.";
                        endif;
                        ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-warning">
                    <div class="panel-heading text-center">
                        <h3 class="text-warning">
                            <span class="glyphicon glyphicon-exclamation-sign"></span> Atividades em andamento
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            if (count($atividadesEmAndamento) > 0) :
                                foreach ($atividadesEmAndamento as $emAndamento) :
                            ?>
                                <li><span class="glyphicon glyphicon-exclamation-sign"></span> <a href="<?= SITE_URL ?>atividades/view.php?id=<?= $emAndamento['id'] ?>"><?= $emAndamento['titulo'] ?></a></li>
                            <?php
                                endforeach;
                            else:
                                echo "Nenhuma atividade em andamento.";
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h3 class="text-primary">
                            <span class="glyphicon glyphicon-ok"></span> Atividades resolvidas
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <?php
                            if (count($atividadesResolvidas) > 0) :
                                foreach ($atividadesResolvidas as $resolvida) :
                            ?>
                                <li><span class="glyphicon glyphicon-ok"></span> <a href="<?= SITE_URL ?>atividades/view.php?id=<?= $resolvida['id'] ?>"><?= $resolvida['titulo'] ?></a></li>
                            <?php
                                endforeach;
                            else:
                                echo "Nenhuma atividade concluída.";
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'template/footer.php';
showFooter();
