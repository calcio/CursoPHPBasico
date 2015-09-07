    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <?= SUBTITLE; ?> - 2015 - <?= date('Y'); ?>
                <br /><?= VERSION; ?>
            </p>
        </div>
    </footer>
    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php dbClose($connection);
