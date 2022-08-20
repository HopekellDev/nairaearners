<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();

$page = "dashboard";
$page_title = "Dashboard";
include "./views/layouts/UserLayout.php";
