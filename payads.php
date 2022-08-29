<?php
ob_start();
session_start();
include "./includes/Classes/class.site.php";
include "./includes/functions.php";
$app = new WebSettings();
$app->getSetings();
CreateSession();
$page = "payads";
$page_title = "ADS SUbscription";
if (!empty($_GET['action'])) {
    $ad = $_GET['action'];
}else {
    $msg = "Access Denied: Select an AD!";
    notify($msg, 'error');
    header('Location: ./ads');
}
if (isset($_GET['state']) && isset($_GET['action'])) {
    $state = base64_decode($_GET['state']);
    $ad = $_GET['action'];
    if($state == 'paystack'){
        activateAdsPS($id,$ad);
        echo $ad;
    }
}

if (isset($_GET['wallet']))
{
    if($_GET['wallet'] =='true'){
        $bal = GetBalance($id);
        $ad = $_GET['action'];
        if ($bal >= $app->ads_fee) {
            activateAdsPS($id,base64_encode($ad));
        }else{
            $msg = "Insufficient Funds in Wallet!";
            notify($msg, 'error');
            header('Location: ./payads?action=' . $ad);
        }
    }
}
include "./views/layouts/UserLayout.php";
