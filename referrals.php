<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

$page = "referrals";
$page_title = "My downlines";
include "./views/layouts/UserLayout.php";
