<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

create_session();

$page = "withdraw";
$page_title = "Wallet withdraw";
include "./views/layouts/UserLayout.php";
