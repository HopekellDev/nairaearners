<?php
ob_start();
session_start();
require_once './includes/db.php';
session_destroy();
$_SESSION['userSession'] = false;
header("Location: ./login")
?>