<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
if (isset($_POST['withdraw'])) {
    $method ="";
    $balance = GetBalance($id);
    $amount = $_POST['amount'];
    $min_withdraw =$app->min_withdraw;
    MakeWithdraw($id, $amount, $min_withdraw, $balance,$method);
}
$page = "withdraw";
$page_title = "Wallet withdraw";
include "./views/layouts/UserLayout.php";
