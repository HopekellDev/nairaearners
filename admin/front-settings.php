<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

// Email Settings
$mailSend = new SMTPSettings();
$mailSend->getSettings();

$front = new FrontEnd();
$front->GetFrontEnd();

CreateSession();

// Upload Logo
if (isset($_POST['_logo'])) {
    UploadLogo();
}

// Upload Favicon
if (isset($_POST['_icon'])) {
    UploadIcon();
}
$page = "frontend";
$page_title = "Frontend Setting";
include "../user/views/layouts/AdminLayout.php";

