<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
$page = "payads";
$page_title = "ADS SUbscription";
if (!empty($_GET['action'])) {
    $ad = $_GET['action'];
}else {
    $msg = "Access Denied: Select an AD!";
    notify($msg, 'error');
    header('Location: ./ads');
}
include "./views/layouts/UserLayout.php";
