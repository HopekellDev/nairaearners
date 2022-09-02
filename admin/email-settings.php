<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();
if (isset($_POST['email'])) {
    saveGeneral();
}
$page = "email";
$page_title = "Email Setting";
include "../user/views/layouts/AdminLayout.php";

