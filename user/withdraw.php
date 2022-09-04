<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
if (isset($_POST['withdraw'])) {
    
    $balance = GetBalance($id);
    $min_withdraw =$app->min_withdraw;
    MakeWithdraw($id,$min_withdraw, $balance);
}
$page = "withdraw";
$page_title = "Wallet withdraw";
include "./views/layouts/UserLayout.php";
