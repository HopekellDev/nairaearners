<?php

use function Composer\Autoload\includeFile;

ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();

$page = "profile";
$page_title = "My profile";
if(isset($_POST['update_profile'])){
    UpdateProfile($email, $id, $name, $phone, $address, $city, $state, $country);
}
include "./views/layouts/UserL