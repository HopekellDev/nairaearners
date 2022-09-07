<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "../user/includes/Classes/class.site.php";
include "../user/includes/functions.php";
$app = new WebSettings();
$app->getSetings();

CreateSession();
if (isset($_POST['create_country'])) {
    CreateCountry();
    echo "YOU";
}
$page = "country";
$page_title = "Country Management";
include "../user/views/layouts/AdminLayout.php";

