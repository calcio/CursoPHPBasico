    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <?= SUBTITLE; ?> - 2015 - <?= date('Y'); ?>
                <br /><?= VERSION; ?>
            </p>
        </div>
    </footer>
</body>
</html>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<?php dbClose($connection);
