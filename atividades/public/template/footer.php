<?php
function showFooter(array $js=[])
{
?>
    </main>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <?= SUBTITLE; ?> - 2015 / <?= date('Y'); ?>
                <br /><?= VERSION; ?>
            </p>
        </div>
    </footer>
    <script src="<?= SITE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= SITE_URL; ?>assets/js/moment.min.js"></script>
    <script src="<?= SITE_URL; ?>assets/js/pt-br.js"></script>
    <?php
    if ($js) :
        foreach ($js as $script) :
            $src = SITE_URL . 'assets/js/' . $script . '.js';

            if (file_exists(BASE_PATH . 'public/assets/js/' . $script . '.js')) :
    ?>
            <script src="<?= $src ?>"></script>
    <?php
            endif;
        endforeach;
    endif;
    ?>
</body>
</html>
<?php } ?>
