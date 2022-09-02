<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();

$page = "ads";
$page_title = "Ads Management";
include "../user/views/layouts/AdminLayout.php";

