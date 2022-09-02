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

CreateSession();
if (isset($_POST['_email'])) {
    saveEmail();
}

if (isset($_POST['send_email'])) {
    testSMTP();
}
$page = "email";
$page_title = "Email Setting";
include "../user/views/layouts/AdminLayout.php";

