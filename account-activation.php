<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

create_session();

$page = "activation";
$page_title = "Account Activation";
include "./views/layouts/UserLayout.php";
