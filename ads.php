<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
$page = "ads";
$page_title = "Advertisments";
include "./views/layouts/UserLayout.php";
