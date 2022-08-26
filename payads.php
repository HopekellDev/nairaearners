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
include "./views/layouts/UserLayout.php";
