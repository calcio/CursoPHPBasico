<?php
session_start();

unset($_SESSION);
echo $_SESSION['token'];