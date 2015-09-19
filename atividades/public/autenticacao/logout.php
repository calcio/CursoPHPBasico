<?php
session_start();
session_destroy();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/constants.php';

header('Location: ' . SITE_URL . 'index.php');
