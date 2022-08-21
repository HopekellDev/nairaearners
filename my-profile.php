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

if (isset($_POST['update_pass'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['password'];
    $pass_confirm = $_POST['repass'];
    UpdatePassword($email, $id, $name, $password, $old_pass, $new_pass, $pass_confirm);
}
include "./views/layouts/UserLayout.php";
